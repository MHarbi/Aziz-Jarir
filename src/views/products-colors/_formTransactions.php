<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

Pjax::begin();
$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'Transactions',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'order_number' => ['type' => TabularForm::INPUT_TEXT],
        'customer_id' => [
            'label' => 'Customers',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Customers::find()->orderBy('name')->asArray()->all(), 'customer_id', 'name'),
                'options' => ['placeholder' => 'Choose Customers'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'store_id' => [
            'label' => 'Stores',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Stores::find()->orderBy('store_id')->asArray()->all(), 'store_id', 'store_id'),
                'options' => ['placeholder' => 'Choose Stores'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'saleperson_id' => [
            'label' => 'Salespersons',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Salespersons::find()->orderBy('name')->asArray()->all(), 'ssn', 'name'),
                'options' => ['placeholder' => 'Choose Salespersons'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'color' => ['type' => TabularForm::INPUT_TEXT],
        'os' => ['type' => TabularForm::INPUT_TEXT],
        'quantity' => ['type' => TabularForm::INPUT_TEXT],
        'price' => ['type' => TabularForm::INPUT_TEXT],
        'purchase_data' => ['type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\DatePicker::classname(),
            'options' => [
                'options' => ['placeholder' => 'Choose Purchase Data'],
                'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
                'pluginOptions' => [
                    'autoclose' => true,
                    'format' => 'dd-M-yyyy'
                ]
            ]
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowTransactions(' . $key . '); return false;', 'id' => 'transactions-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . 'Transactions',
            'type' => GridView::TYPE_INFO,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Row', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowTransactions()']),
        ]
    ]
]);
Pjax::end();
?>
