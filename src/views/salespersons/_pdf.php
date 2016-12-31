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
                'label' => 'Country'
        ],
        [
                'attribute' => 'stores.store_id',
                'label' => 'Store'
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
            'heading' => Html::encode('Manage Regions'.' '. $this->title),
        ],
        'columns' => $gridColumnManageRegions
    ]);
?>
    </div>
    
    <div class="row">
<?php
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
            'heading' => Html::encode('Manage Stores'.' '. $this->title),
        ],
        'columns' => $gridColumnManageStores
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
