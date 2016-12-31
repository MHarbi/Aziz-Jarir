<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BusinessCustomersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-business-customers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'customer_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Customers::find()->orderBy('customer_id')->asArray()->all(), 'customer_id', 'name'),
        'options' => ['placeholder' => 'Choose Customers'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <?= $form->field($model, 'business_category')->textInput(['maxlength' => true, 'placeholder' => 'Business Category']) ?>

    <?= $form->field($model, 'gross_annual_income')->textInput(['placeholder' => 'Gross Annual Income']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
