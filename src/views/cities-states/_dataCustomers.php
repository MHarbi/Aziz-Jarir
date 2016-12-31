<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->customers,
        'key' => 'customer_id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        'customer_id',
        'name',
        'email:email',
        'phone',
        'kind',
        'zip',
        'address1',
        'address2',
        'since',
        'password',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'customers'
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
