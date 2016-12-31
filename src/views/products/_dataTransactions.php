<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->transactions,
        'key' => 'order_number'
    ]);
    $gridColumns = [
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
        'color',
        'os',
        'quantity',
        'price',
        'purchase_date',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'transactions'
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
