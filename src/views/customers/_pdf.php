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
                'label' => 'Country'
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
