<?php

namespace app\controllers;

use Yii;
use app\models\Customers;
use app\models\CustomersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\HomeCustomers;
use app\models\BusinessCustomers;

/**
 * CustomersController implements the CRUD actions for Customers model.
 */
class CustomersController extends Controller
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
                'only' => ['create', 'index', 'view', 'update','delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create'],
                        'roles' => ['?']
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'update','delete'],
                        'roles' => ['@']
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all Customers models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->identity->user_type=="salesperson")
        {
            $this->layout = 'management';
            $searchModel = new CustomersSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else
            throw new \yii\web\HttpException(400, "Your are not allowed to enter this page.", 405);
    }

    /**
     * Displays a single Customers model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        if(Yii::$app->user->identity->id == $id OR Yii::$app->user->identity->user_type=="salesperson")
        {
            if(Yii::$app->user->identity->user_type=="salesperson"){
                $this->layout = 'management';
            }
            $model = $this->findModel($id);
            $providerTransactions = new \yii\data\ArrayDataProvider([
                'allModels' => $model->transactions,
            ]);
            return $this->render('view', [
                'model' => $this->findModel($id),
                'providerTransactions' => $providerTransactions,
                'hmodel' => HomeCustomers::findOne($id),
                'bmodel' => BusinessCustomers::findOne($id),
            ]);
        }
        else
            throw new \yii\web\HttpException(400, "Your are not allowed to enter this page.", 405);
    }

    /**
     * Creates a new Customers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->isGuest){
            $this->layout = 'management';
        }

        $model = new Customers();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {

            if($model->kind == "Business"){
                return $this->redirect(['business-customers/create', 'id' => $model->customer_id]);
            }
            else{
                return $this->redirect(['home-customers/create', 'id' => $model->customer_id]);

            }
            
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Customers model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(Yii::$app->user->identity->user_type=="salesperson")
        {
            $this->layout = 'management';
        }
        $model = $this->findModel($id);

        if ($model->loadAll(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->customer_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }

    }

    /**
     * Deletes an existing Customers model.
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
        $providerTransactions = new \yii\data\ArrayDataProvider([
            'allModels' => $model->transactions,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
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
     * Finds the Customers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customers::findOne($id)) !== null) {
            return $model;
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
