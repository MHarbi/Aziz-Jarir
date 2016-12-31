<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Products;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'checkout', 'manage'],
                'rules' => [
                    [
                        'actions' => ['logout', 'checkout', 'manage'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $brands = Products::find()->select('brand')->distinct()->all();
        $db = Yii::$app->db;
        $best_sellers = $db->createCommand("SELECT * FROM best_sellers")->queryAll();
        $new_collection = $db->createCommand("SELECT * FROM new_collection")->queryAll();
        $random_products = $db->createCommand("SELECT * FROM random_products")->queryAll();

        return $this->render('index', [
            'brands' => $brands,
            'best_sellers' => $best_sellers,
            'new_collection' => $new_collection,
            'random_products' => $random_products,
        ]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionBlog()
    {
        return $this->render('blog');
    }

    public function actionPolicy()
    {
        return $this->render('policy');
    }

    public function actionTerms()
    {
        return $this->render('terms');
    }

    public function actionManage()
    {
        if(Yii::$app->user->identity->user_type=="salesperson"){
            $this->layout = 'management';
            return $this->render('manage');
        }
        else
            throw new \yii\web\HttpException(400, "Your are not allowed to enter this page.", 405);
            
    }

    public function actionCart()
    {
        $session = Yii::$app->session;
        if ($session->isActive)
            $session->open();

        return $this->render('cart', 
            ['cartarr' => $session['cart']]);
    }

    public function actionCartUpdate($id)
    {
        $session = Yii::$app->session;
        if ($session->isActive)
            $session->open();

        $cartarr = $session['cart'];
        $newCart = array();

        foreach($cartarr as $item) {
            if($item['id'] != $id){
                $newCart[] = $item;
            }
        }
        $session['cart'] = $newCart;

        return $this->redirect(['site/cart']);
    }

    public function actionCheckout()
    {
        if (!\Yii::$app->user->isGuest AND Yii::$app->user->identity->user_type=="customer") 
        {

            $session = Yii::$app->session;
            if ($session->isActive)
                $session->open();

            if (isset($session['cart']))
            {
                $db = Yii::$app->db;
                $transaction = $db->beginTransaction();
                $cartarr = $session['cart'];

                try {
                    foreach($cartarr as $item)
                    {
                        $sql1 = 'SELECT * FROM full_products WHERE product_id = '.$item['product_id'].' AND color = "'.$item['color'].'" AND os = "'.$item['os'].'"';
                        $rows = $db->createCommand($sql1)->queryAll();
                        if(sizeof($rows)>0){
                            if($rows[0]['inventory_amount'] >= $item['quantity']){
                                
                                $customer_id = Yii::$app->user->identity->id;

                                $sql2 = "INSERT INTO `transactions`(`customer_id`, `product_id`, `color`, `os`, `quantity`, `price`, `purchase_date`, `saleperson_id`, `store_id`) VALUES (" . $customer_id . ", ".$item['product_id'].", '".$item['color']."', '".$item['os']."', ".$item['quantity'].", ".$item['price'].", '".date('Y-m-d')."', 0, 1)";
                                $db->createCommand($sql2)->execute();

                                $sql3 = 'UPDATE `products_inventory` SET `inventory_amount`='.(((int)$rows[0]['inventory_amount']) - ((int)$item['quantity'])).' WHERE product_id = '.$item['product_id'].' AND color = "'.$item['color'].'" AND os = "'.$item['os'].'"';
                                $db->createCommand($sql3)->execute();
                            }
                            else {
                                Yii::$app->session->setFlash('error', "Sorry! We don't have the quantity you picked for ".$item['pname'].", ".$item['color'].", ".$item['os'].".");
                                $transaction->rollBack();
                                return $this->redirect(['site/cart']);
                            }
                        }
                        else {
                            Yii::$app->session->setFlash('error', "Sorry! ".$item['pname']." is out of the stock.");
                            $transaction->rollBack();
                            return $this->redirect(['site/cart']);
                        }
                        //$db->createCommand($sql2)->execute();
                        // ... executing other SQL statements ...
                    
                    }
                    $transaction->commit();

                    Yii::$app->session->setFlash('success', "Success! Your order has been placed successfully.");
                    $session['cart'] = array();
                    return $this->redirect(['site/cart']);

                } catch(\Exception $e) {

                    $transaction->rollBack();
                    
                    throw $e;
                }
            }
            else
                return $this->redirect(['site/cart']);
        }
    }
}
