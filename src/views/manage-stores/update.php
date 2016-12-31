<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ManageStores */

$this->title = 'Update Manage Stores: ' . ' ' . $model->ssn;
$this->params['breadcrumbs'][] = ['label' => 'Manage Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ssn, 'url' => ['view', 'ssn' => $model->ssn, 'store_id' => $model->store_id, 'since' => $model->since]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="manage-stores-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
