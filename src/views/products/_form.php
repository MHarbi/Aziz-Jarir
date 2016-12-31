<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'ProductsColors', 
        'relID' => 'products-colors', 
        'value' => \yii\helpers\Json::encode($model->productsColors),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'ProductsInventory', 
        'relID' => 'products-inventory', 
        'value' => \yii\helpers\Json::encode($model->productsInventories),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'ProductsOs', 
        'relID' => 'products-os', 
        'value' => \yii\helpers\Json::encode($model->productsOs),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Transactions', 
        'relID' => 'transactions', 
        'value' => \yii\helpers\Json::encode($model->transactions),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype'=>'multipart/form-data']]); ?>
    
    <?= $form->errorSummary($model); ?>

    <?php // $form->field($model, 'product_id')->textInput(['placeholder' => 'Product']) ?>

    <?= $form->field($model, 'pname')->textInput(['maxlength' => true, 'placeholder' => 'Pname']) ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true, 'placeholder' => 'Brand']) ?>

    <?php //$form->field($model, 'picture')->textInput(['maxlength' => true, 'placeholder' => 'Picture']) ?>
    
    <?= $form->field($model, 'picture')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            //'showPreview' => false,
            //'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false,
            'initialPreview'=>[
                Html::img(Url::base()."/img/products/".$model->picture, ['class'=>'file-preview-image']),
            ],
        ]
    ]); ?>

    <?= $form->field($model, 'product_kind')->textInput(['maxlength' => true, 'placeholder' => 'Product Kind']) ?>

    <?= $form->field($model, 'screen')->textInput(['maxlength' => true, 'placeholder' => 'Screen']) ?>

    <?= $form->field($model, 'memory')->textInput(['placeholder' => 'Memory']) ?>

    <?= $form->field($model, 'processor')->textInput(['maxlength' => true, 'placeholder' => 'Processor']) ?>

    <div class="form-group" id="add-products-colors"></div>

    <div class="form-group" id="add-products-inventory"></div>

    <div class="form-group" id="add-products-os"></div>

    <div class="form-group" id="add-transactions"></div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'),['index'],['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
