<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\CitiesStates */

?>
<div class="cities-states-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->country) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'country',
        'zip',
        'city',
        'state',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>