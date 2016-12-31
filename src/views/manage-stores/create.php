<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ManageStores */

$this->title = 'Create Manage Stores';
$this->params['breadcrumbs'][] = ['label' => 'Manage Stores', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manage-stores-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
