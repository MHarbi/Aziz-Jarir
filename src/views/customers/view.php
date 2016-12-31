<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customers-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Customers'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <?php if(Yii::$app->user->identity->user_type=="salesperson"){ ?>
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model['customer_id']],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>                        
            <?php } ?>
            <?= Html::a('Update', ['update', 'id' => $model->customer_id], ['class' => 'btn btn-primary']) ?>
            <?php if(Yii::$app->user->identity->user_type=="salesperson"){ ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->customer_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
            <?php } ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'customer_id',
        'name',
        'email:email',
        'phone',
        'kind',
        'zip',
        [
            'attribute' => 'citiesStates.country',
            'label' => 'Country',
        ],
        'address1',
        'address2',
        'since',
        'password',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>

<?php if($hmodel !== null){ ?>
    <div class="row">
<?php 
    $gridColumn = [
        'income',
        'dob',
        'gender',
        'marriage_status',
    ];
    echo DetailView::widget([
        'model' => $hmodel,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    <?php } ?>

<?php if($bmodel !== null){ ?>
    <div class="row">

<?php 
    $gridColumn = [
        'business_category',
        'gross_annual_income',
    ];
    echo DetailView::widget([
        'model' => $bmodel,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    <?php } ?>

    <div class="row">
<?php
if($providerTransactions->totalCount){
    $gridColumnTransactions = [
        ['class' => 'yii\grid\SerialColumn'],
            'order_number',
            [
                'attribute' => 'customers.name',
                'label' => 'Customer'
        ],
            [
                'attribute' => 'stores.store_id',
                'label' => 'Store'
        ],
            [
                'attribute' => 'salespersons.name',
                'label' => 'Saleperson'
        ],
            [
                'attribute' => 'productsColors.product_id',
                'label' => 'Product'
        ],
            'color',
            'os',
            'quantity',
            'price',
            'purchase_date',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerTransactions,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-transactions']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Transactions'.' '. $this->title),
        ],
        'columns' => $gridColumnTransactions
    ]);
}
?>
    </div>
</div>