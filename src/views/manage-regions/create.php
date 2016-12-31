<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ManageRegions */

$this->title = 'Create Manage Regions';
$this->params['breadcrumbs'][] = ['label' => 'Manage Regions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manage-regions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
