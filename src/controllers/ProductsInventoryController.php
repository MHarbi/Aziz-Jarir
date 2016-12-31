<?php

namespace app\controllers;

use Yii;
use app\models\ProductsInventory;
use app\models\ProductsInventorySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductsInventoryController implements the CRUD actions for ProductsInventory model.
 */
class ProductsInventoryController extends Controller
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
     * Lists all ProductsInventory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'management';
        $searchModel = new ProductsInventorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductsInventory model.
     * @param integer $product_id
     * @param string $os
     * @param string $color
     * @return mixed
     */
    public function actionView($product_id, $os, $color)
    {
        $this->layout = 'management';
        $model = $this->findModel($product_id, $os, $color);
        return $this->render('view', [
            'model' => $this->findModel($product_id, $os, $color),
        ]);
    }

    /**
     * Creates a new ProductsInventory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'management';
        $model = new ProductsInventory();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'os' => $model->os, 'color' => $model->color]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductsInventory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $product_id
     * @param string $os
     * @param string $color
     * @return mixed
     */
    public function actionUpdate($product_id, $os, $color)
    {
        $this->layout = 'management';
        $model = $this->findModel($product_id, $os, $color);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'product_id' => $model->product_id, 'os' => $model->os, 'color' => $model->color]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductsInventory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $product_id
     * @param string $os
     * @param string $color
     * @return mixed
     */
    public function actionDelete($product_id, $os, $color)
    {
        $this->layout = 'management';
        $this->findModel($product_id, $os, $color)->deleteWithRelated();

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

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
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
     * Finds the ProductsInventory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $product_id
     * @param string $os
     * @param string $color
     * @return ProductsInventory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($product_id, $os, $color)
    {
        if (($model = ProductsInventory::findOne(['product_id' => $product_id, 'os' => $os, 'color' => $color])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
