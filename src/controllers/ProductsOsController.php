<?php

namespace app\controllers;

use Yii;
use app\models\ProductsOs;
use app\models\ProductsOsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductsOsController implements the CRUD actions for ProductsOs model.
 */
class ProductsOsController extends Controller
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
                        'actions' => ['index', 'view', 'create', 'update','delete'],
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
     * Lists all ProductsOs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'management';
        $searchModel = new ProductsOsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductsOs model.
     * @param integer $product_id
     * @param string $os
     * @return mixed
     */
    public function actionView($product_id, $os)
    {
        $this->layout = 'management';
        $model = $this->findModel($product_id, $os);
        $providerProductsInventory = new \yii\data\ArrayDataProvider([
            'allModels' => $model->productsInventories,
        ]);
        $providerTransactions = new \yii\data\ArrayDataProvider([
            'allModels' => $model->transactions,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($product_id, $os),
            'providerProductsInventory' => $providerProductsInventory,
            'providerTransactions' => $providerTransactions,
        ]);
    }

    /**
     * Creates a new ProductsOs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $this->layout = 'management';
        $model = new ProductsOs();
        $model->product_id = $id;

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['products/view', 'id' => $model->product_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductsOs model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @param string $os
     * @return mixed
     */
    public function actionUpdate($product_id, $os)
    {
        $this->layout = 'management';
        $model = $this->findModel($product_id, $os);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'os' => $model->os]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductsOs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_id
     * @param string $os
     * @return mixed
     */
    public function actionDelete($product_id, $os)
    {
        $this->layout = 'management';
        $this->findModel($product_id, $os)->deleteWithRelated();

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
        $providerProductsInventory = new \yii\data\ArrayDataProvider([
            'allModels' => $model->productsInventories,
        ]);
        $providerTransactions = new \yii\data\ArrayDataProvider([
            'allModels' => $model->transactions,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerProductsInventory' => $providerProductsInventory,
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
     * Finds the ProductsOs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_id
     * @param string $os
     * @return ProductsOs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id, $os)
    {
        if (($model = ProductsOs::findOne(['product_id' => $product_id, 'os' => $os])) !== null) {
            return $model;
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
