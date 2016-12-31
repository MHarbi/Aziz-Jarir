<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessCustomers */

$this->title = $model->customer_id;
$this->params['breadcrumbs'][] = ['label' => 'Business Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-customers-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Business Customers'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
                'attribute' => 'customers.name',
                'label' => 'Customer'
        ],
        'business_category',
        'gross_annual_income',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
