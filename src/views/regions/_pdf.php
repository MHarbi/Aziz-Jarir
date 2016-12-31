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
            'heading' => Html::encode('Stores'.' '. $this->title),
        ],
        'columns' => $gridColumnStores
    ]);
?>
    </div>
</div>
