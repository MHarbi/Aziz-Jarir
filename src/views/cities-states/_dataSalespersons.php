<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->salespersons,
        'key' => 'ssn'
    ]);
    $gridColumns = [
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
                'attribute' => 'stores.store_id',
                'label' => 'Store'
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'salespersons'
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
