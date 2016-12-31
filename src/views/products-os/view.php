<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsOs */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Products Os', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-os-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Products Os'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
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
            <?= Html::a('Update', ['update', 'product_id' => $model->product_id, 'os' => $model->os], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'product_id' => $model->product_id, 'os' => $model->os], [
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
        [
            'attribute' => 'products.product_id',
            'label' => 'Product',
        ],
        'os',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
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
            'purchase_data',
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