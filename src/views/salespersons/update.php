<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Salespersons */

$this->title = 'Update Salespersons: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Salespersons', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->ssn]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="salespersons-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
