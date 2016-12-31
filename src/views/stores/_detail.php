<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Stores */

?>
<div class="stores-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->store_id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'store_id',
        [
            'attribute' => 'regions.name',
            'label' => 'Region',
        ],
        'zip',
        [
            'attribute' => 'citiesStates.country',
            'label' => 'Country',
        ],
        'address1',
        'address2',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>