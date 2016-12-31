<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CitiesStates */

$this->title = 'Create Cities States';
$this->params['breadcrumbs'][] = ['label' => 'Cities States', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cities-states-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
