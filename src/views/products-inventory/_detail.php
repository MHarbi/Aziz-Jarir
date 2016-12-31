<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsInventory */

?>
<div class="products-inventory-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->product_id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
            'attribute' => 'products.product_id',
            'label' => 'Product',
        ],
        'os',
        'color',
        'inventory_amount',
        'price',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>