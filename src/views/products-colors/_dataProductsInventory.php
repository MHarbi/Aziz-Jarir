<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->productsInventories,
        'key' => function($model){
            return ['product_id' => $model->product_id, 'os' => $model->os, 'color' => $model->color];
        }
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'os',
        'color',
        'inventory_amount',
        'price',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'products-inventory'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
