<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Salespersons */

$this->title = 'Create Salespersons';
$this->params['breadcrumbs'][] = ['label' => 'Salespersons', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="salespersons-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
