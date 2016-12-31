<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->stores,
        'key' => 'store_id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'store_id',
        [
                'attribute' => 'regions.name',
                'label' => 'Region'
        ],
        'zip',
        'address1',
        'address2',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'stores'
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
