<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsInventory */

$this->title = 'Update Products Inventory: ' . ' ' . $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Products Inventory', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_id, 'url' => ['view', 'product_id' => $model->product_id, 'os' => $model->os, 'color' => $model->color]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-inventory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
