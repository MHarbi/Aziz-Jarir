<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\CitiesStates */

$this->title = $model->country;
$this->params['breadcrumbs'][] = ['label' => 'Cities States', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cities-states-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Cities States'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model['country']],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>                        
            <?= Html::a('Update', ['update', 'country' => $model->country, 'zip' => $model->zip], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'country' => $model->country, 'zip' => $model->zip], [
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
        'country',
        'zip',
        'city',
        'state',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerCustomers->totalCount){
    $gridColumnCustomers = [
        ['class' => 'yii\grid\SerialColumn'],
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
    echo Gridview::widget([
        'dataProvider' => $providerCustomers,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-customers']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Customers'.' '. $this->title),
        ],
        'columns' => $gridColumnCustomers
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerSalespersons->totalCount){
    $gridColumnSalespersons = [
        ['class' => 'yii\grid\SerialColumn'],
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
    echo Gridview::widget([
        'dataProvider' => $providerSalespersons,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-salespersons']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Salespersons'.' '. $this->title),
        ],
        'columns' => $gridColumnSalespersons
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerStores->totalCount){
    $gridColumnStores = [
        ['class' => 'yii\grid\SerialColumn'],
            'store_id',
            [
                'attribute' => 'regions.name',
                'label' => 'Region'
        ],
            'zip',
            [
                'attribute' => 'citiesStates.country',
                'label' => 'Country'
        ],
            'address1',
            'address2',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerStores,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-stores']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Stores'.' '. $this->title),
        ],
        'columns' => $gridColumnStores
    ]);
}
?>
    </div>
</div>