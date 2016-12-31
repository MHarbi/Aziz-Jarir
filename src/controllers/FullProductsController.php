<?php

namespace app\controllers;

use Yii;
use app\models\FullProducts;
use app\models\FullProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Products;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use app\models\FullProductsND;

/**
 * FullProductsController implements the CRUD actions for FullProducts model.
 */
class FullProductsController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Displays a single FullProducts model.
     * 
     * @return mixed
     */
    public function actionIndex($brand = null)
    {
        $brands = Products::find()->select('brand')->distinct()->all();
        $db = Yii::$app->db;
        $best_sellers = $db->createCommand("SELECT * FROM best_sellers")->queryAll();
        $model = null;

        if($brand == null)
            $model = FullProductsND::find();
        else
            $model = FullProductsND::find()->where(['brand' => $brand]);

        if ($model->all() !== null) {
            
            $dataProvider = new ActiveDataProvider([
                'query' => $model->orderBy('product_id DESC'),
                'pagination' => [
                    'pageSize' => 6,
                ],
            ]);

            //$this->view->title = 'Posts List';
        
            return $this->render('index', [
                'productsDataProvider' => $dataProvider,
                'brands' => $brands,
                'best_sellers' => $best_sellers,
            ]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionIndexc($cat = null)
    {
        $brands = Products::find()->select('brand')->distinct()->all();
        $db = Yii::$app->db;
        $best_sellers = $db->createCommand("SELECT * FROM best_sellers")->queryAll();
        $model = null;

        if($cat == null)
            $model = FullProductsND::find();
        else
            $model = FullProductsND::find()->where(['product_kind' => $cat]);

        if ($model->all() !== null) {
            
            $dataProvider = new ActiveDataProvider([
                'query' => $model->orderBy('product_id DESC'),
                'pagination' => [
                    'pageSize' => 6,
                ],
            ]);

            //$this->view->title = 'Posts List';
        
            return $this->render('indexc', [
                'productsDataProvider' => $dataProvider,
                'brands' => $brands,
                'best_sellers' => $best_sellers,
            ]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionView($id)
    {
        $model = null;
        if(Yii::$app->request->isAjax)
        {
            $color = Yii::$app->request->post('color');
            $os = Yii::$app->request->post('os');
            $model = FullProducts::find()->andWhere(['product_id' => $id, 'color' => $color, 'os' => $os])->all();
        }
        else
            $model = FullProducts::find()->where(['product_id' => $id])->all();

        if ($model !== null) {
            
            return $this->render('view', [
                'model' => $model[0],
                'unqOs' => FullProducts::find()->select('os')->where(['product_id' => $id])->distinct()->all(),
                'unqColor' => FullProducts::find()->select('color')->where(['product_id' => $id])->distinct()->all()
            ]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionAddToCart($id, $color, $os, $quantity){

        //if(Yii::$app->request->isAjax)
        {
            $model = null;
            $model = FullProducts::find()->andWhere(['product_id' => $id, 'color' => $color, 'os' => $os])->all();

            if ($model !== null) {

                $session = Yii::$app->session;
                if ($session->isActive)
                    $session->open();

                

                if (!isset($session['cart']) || count($session['cart'])==0) 
                {
                     $session['cart'] = array(array('id' => $id . "," . $color . "," . $os . "," . $quantity, 
                                              'product_id' => $model[0]->product_id,
                                              'pname' => $model[0]->pname,
                                              'color' => $model[0]->color,
                                              'picture' => file_exists(Url::base()+'/img/products/'.$model[0]->picture)? $model->picture : 'sample1.jpg' ,
                                              'os' => $model[0]->os,
                                              'price' => $model[0]->price,
                                              'quantity' => $quantity));
                }
                else {
                    $myarr = $session['cart'];
                    $myarr[] = array('id' => $id . "," . $color . "," . $os . "," . $quantity, 
                                              'product_id' => $model[0]->product_id,
                                              'pname' => $model[0]->pname,
                                              'color' => $model[0]->color,
                                              'picture' => file_exists(Url::base()+'/img/products/'.$model[0]->picture)? $model->picture : 'sample1.jpg' ,
                                              'os' => $model[0]->os,
                                              'price' => $model[0]->price,
                                              'quantity' => $quantity);
                    $session['cart'] = $myarr;
                }
                return \yii\helpers\Json::encode($session['cart']);
            }
        }
    }

    public function actionSearch()
    {
        $brands = Products::find()->select('brand')->distinct()->all();
        $db = Yii::$app->db;
        $best_sellers = $db->createCommand("SELECT * FROM best_sellers")->queryAll();
        $model = null;

        $keyword = Yii::$app->request->post('keyword');

        $model = FullProductsND::find()->where(['LIKE', 'pname', $keyword]);

        if ($model->all() !== null) {
            
            $dataProvider = new ActiveDataProvider([
                'query' => $model->orderBy('product_id DESC'),
                'pagination' => [
                    'pageSize' => 6,
                ],
            ]);

            $this->view->title = 'Search results';
        
            return $this->render('index', [
                'productsDataProvider' => $dataProvider,
                'brands' => $brands,
                'best_sellers' => $best_sellers,
            ]);
        } else {
            throw new NotFoundHttpException('Sorry! We could not find any result match your word.');
        }
    }
}
