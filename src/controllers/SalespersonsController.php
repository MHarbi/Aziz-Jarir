<?php

namespace app\controllers;

use Yii;
use app\models\Salespersons;
use app\models\SalespersonsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SalespersonsController implements the CRUD actions for Salespersons model.
 */
class SalespersonsController extends Controller
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
     * Lists all Salespersons models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'management';
        $searchModel = new SalespersonsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Salespersons model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        $this->layout = 'management';
        $model = $this->findModel($id);
        $providerManageRegions = new \yii\data\ArrayDataProvider([
            'allModels' => $model->manageRegions,
        ]);
        $providerManageStores = new \yii\data\ArrayDataProvider([
            'allModels' => $model->manageStores,
        ]);
        $providerTransactions = new \yii\data\ArrayDataProvider([
            'allModels' => $model->transactions,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerManageRegions' => $providerManageRegions,
            'providerManageStores' => $providerManageStores,
            'providerTransactions' => $providerTransactions,
        ]);
    }

    /**
     * Creates a new Salespersons model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'management';
        $model = new Salespersons();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->ssn]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Salespersons model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $this->layout = 'management';
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ssn]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Salespersons model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
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
        $providerManageRegions = new \yii\data\ArrayDataProvider([
            'allModels' => $model->manageRegions,
        ]);
        $providerManageStores = new \yii\data\ArrayDataProvider([
            'allModels' => $model->manageStores,
        ]);
        $providerTransactions = new \yii\data\ArrayDataProvider([
            'allModels' => $model->transactions,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerManageRegions' => $providerManageRegions,
            'providerManageStores' => $providerManageStores,
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
     * Finds the Salespersons model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Salespersons the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Salespersons::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for ManageRegions
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddManageRegions()
    {
        $this->layout = 'management';
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('ManageRegions');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formManageRegions', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for ManageStores
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddManageStores()
    {
        $this->layout = 'management';
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('ManageStores');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formManageStores', ['row' => $row]);
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
