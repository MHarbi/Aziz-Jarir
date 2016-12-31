<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductsInventory */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="products-inventory-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

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
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
