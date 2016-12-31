<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BusinessCustomers */

$this->title = 'Create Business Customers';
$this->params['breadcrumbs'][] = ['label' => 'Business Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="business-customers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
