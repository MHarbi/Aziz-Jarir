<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\HomeCustomers */

$this->title = $model->customer_id;
$this->params['breadcrumbs'][] = ['label' => 'Home Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-customers-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Home Customers'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
                'attribute' => 'customers.name',
                'label' => 'Customer'
        ],
        'income',
        'dob',
        'gender',
        'marriage_status',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
