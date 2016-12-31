<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CitiesStates */

$this->title = 'Update Cities States: ' . ' ' . $model->country;
$this->params['breadcrumbs'][] = ['label' => 'Cities States', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->country, 'url' => ['view', 'country' => $model->country, 'zip' => $model->zip]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cities-states-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
