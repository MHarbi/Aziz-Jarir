<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ManageStores */

$this->title = $model->ssn;
$this->params['breadcrumbs'][] = ['label' => 'Manage Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manage-stores-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Manage Stores'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model['ssn']],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>                        
            <?= Html::a('Update', ['update', 'ssn' => $model->ssn, 'store_id' => $model->store_id, 'since' => $model->since], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'ssn' => $model->ssn, 'store_id' => $model->store_id, 'since' => $model->since], [
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
        [
            'attribute' => 'salespersons.name',
            'label' => 'Ssn',
        ],
        [
            'attribute' => 'stores.store_id',
            'label' => 'Store',
        ],
        'since',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>