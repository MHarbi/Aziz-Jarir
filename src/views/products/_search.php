<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'product_id')->textInput(['placeholder' => 'Product']) ?>

    <?= $form->field($model, 'pname')->textInput(['maxlength' => true, 'placeholder' => 'Pname']) ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true, 'placeholder' => 'Brand']) ?>

    <?= $form->field($model, 'product_kind')->textInput(['maxlength' => true, 'placeholder' => 'Product Kind']) ?>

    <?= $form->field($model, 'screen')->textInput(['maxlength' => true, 'placeholder' => 'Screen'])  ?>

    <?=$form->field($model, 'memory')->textInput(['placeholder' => 'Memory']) ?>

    <?= $form->field($model, 'processor')->textInput(['maxlength' => true, 'placeholder' => 'Processor']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
