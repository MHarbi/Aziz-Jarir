<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HomeCustomers */

$this->title = 'Create Home Customers';
$this->params['breadcrumbs'][] = ['label' => 'Home Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="home-customers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
