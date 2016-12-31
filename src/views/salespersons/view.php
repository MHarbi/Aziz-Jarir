<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Salespersons */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Salespersons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salespersons-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Salespersons'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model['ssn']],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>                        
            <?= Html::a('Update', ['update', 'id' => $model->ssn], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->ssn], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'ssn',
        'name',
        'dob',
        'phone',
        'salary',
        'job_title',
        'password',
        'email:email',
        'address1',
        'address2',
        'zip',
        [
            'attribute' => 'citiesStates.country',
            'label' => 'Country',
        ],
        [
            'attribute' => 'stores.store_id',
            'label' => 'Store',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerManageRegions->totalCount){
    $gridColumnManageRegions = [
        ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'salespersons.name',
                'label' => 'Ssn'
        ],
            [
                'attribute' => 'regions.name',
                'label' => 'Region'
        ],
            'since',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerManageRegions,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-manage-regions']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Manage Regions'.' '. $this->title),
        ],
        'columns' => $gridColumnManageRegions
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerManageStores->totalCount){
    $gridColumnManageStores = [
        ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'salespersons.name',
                'label' => 'Ssn'
        ],
            [
                'attribute' => 'stores.store_id',
                'label' => 'Store'
        ],
            'since',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerManageStores,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-manage-stores']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Manage Stores'.' '. $this->title),
        ],
        'columns' => $gridColumnManageStores
    ]);
}
?>
    </div>
    
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