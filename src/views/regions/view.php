<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Regions */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Regions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="regions-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Regions'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model['region_id']],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>                        
            <?= Html::a('Update', ['update', 'id' => $model->region_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->region_id], [
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
        'region_id',
        'name',
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