<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Customers */

?>
<div class="customers-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->name) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'customer_id',
        'name',
        'email:email',
        'phone',
        'kind',
        'zip',
        [
            'attribute' => 'citiesStates.country',
            'label' => 'Country',
        ],
        'address1',
        'address2',
        'since',
        'password',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>