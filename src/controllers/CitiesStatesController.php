<?php

namespace app\controllers;

use Yii;
use app\models\CitiesStates;
use app\models\CitiesStatesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CitiesStatesController implements the CRUD actions for CitiesStates model.
 */
class CitiesStatesController extends Controller
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
     * Lists all CitiesStates models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->layout = 'management';
        $searchModel = new CitiesStatesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CitiesStates model.
     * @param string $country
     * @param string $zip
     * @return mixed
     */
    public function actionView($country, $zip)
    {
        $this->layout = 'management';
        $model = $this->findModel($country, $zip);
        $providerCustomers = new \yii\data\ArrayDataProvider([
            'allModels' => $model->customers,
        ]);
        $providerSalespersons = new \yii\data\ArrayDataProvider([
            'allModels' => $model->salespersons,
        ]);
        $providerStores = new \yii\data\ArrayDataProvider([
            'allModels' => $model->stores,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($country, $zip),
            'providerCustomers' => $providerCustomers,
            'providerSalespersons' => $providerSalespersons,
            'providerStores' => $providerStores,
        ]);
    }

    /**
     * Creates a new CitiesStates model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $this->layout = 'management';
        $model = new CitiesStates();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'country' => $model->country, 'zip' => $model->zip]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing CitiesStates model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $country
     * @param string $zip
     * @return mixed
     */
    public function actionUpdate($country, $zip)
    {
        $this->layout = 'management';
        $model = $this->findModel($country, $zip);

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'country' => $model->country, 'zip' => $model->zip]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing CitiesStates model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $country
     * @param string $zip
     * @return mixed
     */
    public function actionDelete($country, $zip)
    {
        $this->layout = 'management';
        $this->findModel($country, $zip)->deleteWithRelated();

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
        $providerCustomers = new \yii\data\ArrayDataProvider([
            'allModels' => $model->customers,
        ]);
        $providerSalespersons = new \yii\data\ArrayDataProvider([
            'allModels' => $model->salespersons,
        ]);
        $providerStores = new \yii\data\ArrayDataProvider([
            'allModels' => $model->stores,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerCustomers' => $providerCustomers,
            'providerSalespersons' => $providerSalespersons,
            'providerStores' => $providerStores,
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
     * Finds the CitiesStates model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $country
     * @param string $zip
     * @return CitiesStates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($country, $zip)
    {
        if (($model = CitiesStates::findOne(['country' => $country, 'zip' => $zip])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Customers
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddCustomers()
    {
        $this->layout = 'management';
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Customers');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formCustomers', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Salespersons
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddSalespersons()
    {
        $this->layout = 'management';
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Salespersons');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formSalespersons', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for Stores
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddStores()
    {
        $this->layout = 'management';
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('Stores');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('action') == 'load' && empty($row)) || Yii::$app->request->post('action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formStores', ['row' => $row]);
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
