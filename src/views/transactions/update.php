<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Transactions */

$this->title = 'Update Transactions: ' . ' ' . $model->order_number;
$this->params['breadcrumbs'][] = ['label' => 'Transactions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->order_number, 'url' => ['view', 'id' => $model->order_number]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transactions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
