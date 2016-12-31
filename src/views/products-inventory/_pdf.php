<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsInventory */

$this->title = $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Products Inventory', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-inventory-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Products Inventory'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
                'attribute' => 'products.product_id',
                'label' => 'Product'
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
