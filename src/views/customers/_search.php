<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CustomersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-customers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'customer_id')->textInput(['placeholder' => 'Customer']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true, 'placeholder' => 'Phone']) ?>

    <?= $form->field($model, 'kind')->textInput(['maxlength' => true, 'placeholder' => 'Kind']) ?>

    <?php /* echo $form->field($model, 'zip')->textInput(['maxlength' => true, 'placeholder' => 'Zip']) */ ?>

    <?php /* echo $form->field($model, 'country')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\CitiesStates::find()->orderBy('country')->asArray()->all(), 'country', 'country'),
        'options' => ['placeholder' => 'Choose Cities states'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) */ ?>

    <?php /* echo $form->field($model, 'address1')->textInput(['maxlength' => true, 'placeholder' => 'Address1']) */ ?>

    <?php /* echo $form->field($model, 'address2')->textInput(['maxlength' => true, 'placeholder' => 'Address2']) */ ?>

    <?php /* echo $form->field($model, 'since')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Since'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); */ ?>

    <?php /* echo $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => 'Password']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
