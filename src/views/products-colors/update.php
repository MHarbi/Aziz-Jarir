<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsColors */

$this->title = 'Update Products Colors: ' . ' ' . $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Products Colors', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_id, 'url' => ['view', 'product_id' => $model->product_id, 'color' => $model->color]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-colors-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
