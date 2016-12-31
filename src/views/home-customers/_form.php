<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HomeCustomers */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="home-customers-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'customer_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Customers::find()->orderBy('customer_id')->asArray()->all(), 'customer_id', 'name'),
        'options' => ['placeholder' => 'Choose Customers'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Customer') ?>

    <?= $form->field($model, 'income')->textInput(['placeholder' => 'Income']) ?>

    <?= $form->field($model, 'dob')->widget(\kartik\widgets\DatePicker::classname(), [
        'options' => ['placeholder' => 'Choose Dob'],
        'type' => \kartik\widgets\DatePicker::TYPE_COMPONENT_APPEND,
        'pluginOptions' => [
            'autoclose' => true,
            'format' => 'dd-M-yyyy'
        ]
    ]); ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true, 'placeholder' => 'Gender']) ?>

    <?= $form->field($model, 'marriage_status')->textInput(['maxlength' => true, 'placeholder' => 'Marriage Status']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
