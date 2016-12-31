<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Transactions */

?>
<div class="transactions-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->order_number) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'order_number',
        [
            'attribute' => 'customers.name',
            'label' => 'Customer',
        ],
        [
            'attribute' => 'stores.store_id',
            'label' => 'Store',
        ],
        [
            'attribute' => 'salespersons.name',
            'label' => 'Saleperson',
        ],
        [
            'attribute' => 'productsColors.product_id',
            'label' => 'Product',
        ],
        'color',
        'os',
        'quantity',
        'price',
        'purchase_date',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>