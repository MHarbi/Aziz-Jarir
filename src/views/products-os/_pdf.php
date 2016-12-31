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
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
                'attribute' => 'products.product_id',
                'label' => 'Product'
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
            'heading' => Html::encode('Transactions'.' '. $this->title),
        ],
        'columns' => $gridColumnTransactions
    ]);
?>
    </div>
</div>
