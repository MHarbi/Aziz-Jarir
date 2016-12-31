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
    </div>

    <div class="row">
<?php 
    $gridColumn = [
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
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
