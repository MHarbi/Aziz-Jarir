<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-view">

    <div class="row">
        <div class="col-sm-6">
            <h2><?= 'Products'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-6" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model['product_id']],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?> 
            <?= Html::a('Add Color', ['products-colors/create', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Add Operating System', ['products-os/create', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>                       
            <?= Html::a('Update', ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->product_id], [
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
        'product_id',
        'pname',
        'brand',
        'picture',
        'product_kind',
        'screen',
        'memory',
        'processor',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php 
if($providerProductsColors->totalCount){
    $gridColumnProductsColors = [
        ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'products.product_id',
                'label' => 'Product'
        ],
            'color',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerProductsColors,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-products-colors']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Products Colors'.' '. $this->title),
        ],
        'columns' => $gridColumnProductsColors
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerProductsInventory->totalCount){
    $gridColumnProductsInventory = [
        ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'products.product_id',
                'label' => 'Product'
        ],
            'os',
            'color',
            'inventory_amount',
            'price',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerProductsInventory,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-products-inventory']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Products Inventory'.' '. $this->title),
        ],
        'columns' => $gridColumnProductsInventory
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerProductsOs->totalCount){
    $gridColumnProductsOs = [
        ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'products.product_id',
                'label' => 'Product'
        ],
            'os',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerProductsOs,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-products-os']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Products Os'.' '. $this->title),
        ],
        'columns' => $gridColumnProductsOs
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