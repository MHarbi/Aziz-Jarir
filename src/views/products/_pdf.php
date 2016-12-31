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
        <div class="col-sm-9">
            <h2><?= 'Products'.' '. Html::encode($this->title) ?></h2>
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
            'heading' => Html::encode('Products Colors'.' '. $this->title),
        ],
        'columns' => $gridColumnProductsColors
    ]);
?>
    </div>
    
    <div class="row">
<?php
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
            'heading' => Html::encode('Products Inventory'.' '. $this->title),
        ],
        'columns' => $gridColumnProductsInventory
    ]);
?>
    </div>
    
    <div class="row">
<?php
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
            'heading' => Html::encode('Products Os'.' '. $this->title),
        ],
        'columns' => $gridColumnProductsOs
    ]);
?>
    </div>
    
    <div class="row">
<?php
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
            'heading' => Html::encode('Transactions'.' '. $this->title),
        ],
        'columns' => $gridColumnTransactions
    ]);
?>
    </div>
</div>
