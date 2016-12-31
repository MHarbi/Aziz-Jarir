<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ManageRegions */

$this->title = $model->ssn;
$this->params['breadcrumbs'][] = ['label' => 'Manage Regions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manage-regions-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Manage Regions'.' '. Html::encode($this->title) ?></h2>
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
            <?= Html::a('Update', ['update', 'ssn' => $model->ssn, 'region_id' => $model->region_id, 'since' => $model->since], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'ssn' => $model->ssn, 'region_id' => $model->region_id, 'since' => $model->since], [
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
            'attribute' => 'regions.name',
            'label' => 'Region',
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