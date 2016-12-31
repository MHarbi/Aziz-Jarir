<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Salespersons */

?>
<div class="salespersons-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->name) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
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
            'attribute' => 'citiesStates.country',
            'label' => 'Country',
        ],
        [
            'attribute' => 'stores.store_id',
            'label' => 'Store',
        ],
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>