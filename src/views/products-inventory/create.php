<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductsInventory */

$this->title = 'Create Products Inventory';
$this->params['breadcrumbs'][] = ['label' => 'Products Inventory', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-inventory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
