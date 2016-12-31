<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsOs */

$this->title = 'Update Products Os: ' . ' ' . $model->product_id;
$this->params['breadcrumbs'][] = ['label' => 'Products Os', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->product_id, 'url' => ['view', 'product_id' => $model->product_id, 'os' => $model->os]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="products-os-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
