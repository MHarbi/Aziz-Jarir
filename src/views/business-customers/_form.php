<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessCustomers */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="business-customers-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'customer_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Customers::find()->orderBy('customer_id')->asArray()->all(), 'customer_id', 'name'),
        'options' => ['placeholder' => 'Choose Customers'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ])->label('Customer') ?>

    <?= $form->field($model, 'business_category')->textInput(['maxlength' => true, 'placeholder' => 'Business Category']) ?>

    <?= $form->field($model, 'gross_annual_income')->textInput(['placeholder' => 'Gross Annual Income']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
