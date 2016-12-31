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
        <div class="col-sm-3" style="margin-top: 15px">
            <?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model['product_id']],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>                        
            <?= Html::a('Update', ['update', 'product_id' => $model->product_id, 'os' => $model->os, 'color' => $model->color], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'product_id' => $model->product_id, 'os' => $model->os, 'color' => $model->color], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
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