<?php

namespace app\controllers;

use Yii;
use app\models\ManageStores;
use app\models\ManageStoresSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ManageStoresController implements the CRUD actions for ManageStores model.
 */
class ManageStoresController extends Controller
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
     * Lists all ManageStores models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'management';
        $searchModel = new ManageStoresSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ManageStores model.
     * @param string $ssn
     * @param integer $store_id
     * @param string $since
     * @return mixed
     */
    public function actionView($ssn, $store_id, $since)
    {
        $this->layout = 'management';
        $model = $this->findModel($ssn, $store_id, $since);
        return $this->render('view', [
            'model' => $this->findModel($ssn, $store_id, $since),
        ]);
    }

    /**
     * Creates a new ManageStores model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'management';
        $model = new ManageStores();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'ssn' => $model->ssn, 'store_id' => $model->store_id, 'since' => $model->since]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ManageStores model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $ssn
     * @param integer $store_id
     * @param string $since
     * @return mixed
     */
    public function actionUpdate($ssn, $store_id, $since)
    {
        $this->layout = 'management';
        $model = $this->findModel($ssn, $store_id, $since);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'ssn' => $model->ssn, 'store_id' => $model->store_id, 'since' => $model->since]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ManageStores model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $ssn
     * @param integer $store_id
     * @param string $since
     * @return mixed
     */
    public function actionDelete($ssn, $store_id, $since)
    {
        $this->layout = 'management';
        $this->findModel($ssn, $store_id, $since)->deleteWithRelated();

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
     * Finds the ManageStores model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $ssn
     * @param integer $store_id
     * @param string $since
     * @return ManageStores the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($ssn, $store_id, $since)
    {
        if (($model = ManageStores::findOne(['ssn' => $ssn, 'store_id' => $store_id, 'since' => $since])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
