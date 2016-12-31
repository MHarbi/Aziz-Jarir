<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsInventorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-products-inventory-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'product_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Products::find()->orderBy('product_id')->asArray()->all(), 'product_id', 'product_id'),
        'options' => ['placeholder' => 'Choose Products'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'os')->textInput(['maxlength' => true, 'placeholder' => 'Os']) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true, 'placeholder' => 'Color']) ?>

    <?= $form->field($model, 'inventory_amount')->textInput(['placeholder' => 'Inventory Amount']) ?>

    <?= $form->field($model, 'price')->textInput(['placeholder' => 'Price']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
