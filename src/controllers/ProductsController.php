<?php

namespace app\controllers;

use Yii;
use app\models\Products;
use app\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
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
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update','delete','pdf'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'management';
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'management';
        $model = $this->findModel($id);
        //echo '<pre>'; var_dump($model->productsColors->totalCount); echo '</pre>'; exit();
        $providerProductsColors = new \yii\data\ArrayDataProvider([
            'allModels' => $model->productsColors,
        ]);
        $providerProductsInventory = new \yii\data\ArrayDataProvider([
            'allModels' => $model->productsInventories,
        ]);
        $providerProductsOs = new \yii\data\ArrayDataProvider([
            'allModels' => $model->productsOs,
        ]);
        $providerTransactions = new \yii\data\ArrayDataProvider([
            'allModels' => $model->transactions,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerProductsColors' => $providerProductsColors,
            'providerProductsInventory' => $providerProductsInventory,
            'providerProductsOs' => $providerProductsOs,
            'providerTransactions' => $providerTransactions,
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'management';
        $model = new Products();

        if (Yii::$app->request->isPost) {

            $tmpPic = $model->picture;
            $file = \yii\web\UploadedFile::getInstance($model, 'picture');


            if($model->loadAll(Yii::$app->request->post()))
            {
                if ($model->save()) 
                {
                    $model->picture = $model->getPrimaryKey() . "." . $file->getExtension();
                    $model->save();

                    if($file->name != '')
                        $file->saveAs(Url::to('img/products/' . $model->picture));

                    return $this->redirect(['view', 'id' => $model->product_id]);
                } else 
                {
                    return $this->render('create', [
                        'model' => $model,
                    ]);
                }
            }
            
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->product_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'management';
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {

            $tmpPic = $model->picture;
            $file = \yii\web\UploadedFile::getInstance($model, 'picture');


            if($model->loadAll(Yii::$app->request->post()))
            {
                if($file->name == '')
                    $model->picture = $tmpPic;
                else
                    $model->picture = $id . "." . $file->getExtension();

                if ($model->save()) 
                {
                    if($file->name != '')
                        $file->saveAs(Url::to('img/products/' . $model->picture));

                    return $this->redirect(['view', 'id' => $model->product_id]);
                } else 
                {
                    return $this->render('update', [
                        'model' => $model,
                    ]);
                }
            }
            
        } 
        if($model->loadAll(Yii::$app->request->post()) && $model->saveAll())
        {
            return $this->redirect(['view', 'id' => $model->product_id]);
        } else 
        {
            return $this->render('update', [
                'model' => $model,
            ]);
        }      
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->layout = 'management';
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * for export pdf at actionView
     *  
     * @param type $id
     * @return type
     */
    public function actionPdf($id) {
        $this->layout = 'management';
        $model = $this->findModel($id);
        $providerProductsColors = new \yii\data\ArrayDataProvider([
            'allModels' => $model->productsColors,
        ]);
        $providerProductsInventory = new \yii\data\ArrayDataProvider([
            'allModels' => $model->productsInventories,
        ]);
        $providerProductsOs = new \yii\data\ArrayDataProvider([
            'allModels' => $model->productsOs,
        ]);
        $providerTransactions = new \yii\data\ArrayDataProvider([
            'allModels' => $model->transactions,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerProductsColors' => $providerProductsColors,
            'providerProductsInventory' => $providerProductsInventory,
            'providerProductsOs' => $providerProductsOs,
            'providerTransactions' => $providerTransactions,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }
    
    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for ProductsColors
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddProductsColors()
    {
        $this->layout = 'management';
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('ProductsColors');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formProductsColors', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for ProductsInventory
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddProductsInventory()
    {
        $this->layout = 'management';
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('ProductsInventory');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formProductsInventory', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for ProductsOs
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddProductsOs()
    {
        $this->layout = 'management';
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('ProductsOs');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formProductsOs', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Transactions
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddTransactions()
    {
        $this->layout = 'management';
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Transactions');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formTransactions', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
