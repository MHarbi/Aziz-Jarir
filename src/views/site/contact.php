<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Main Content -->
<section class="main-content col-lg-12 col-md-12 col-sm-12">
    
    
    <div class="row">
        
        <div class="col-lg-7 col-md-7 col-sm-7">
            
            <div class="carousel-heading no-margin">
                <h4><?= Html::encode($this->title) ?> Information</h4>
            </div>
            
            <div class="page-content contact-info">
                
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3036.258747526357!2d-79.95484518520213!3d40.447409761698054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xc155227ffc4e7399!2siSchool+at+Pitt!5e0!3m2!1sen!2sus!4v1460021053029" width="425" height="350"></iframe>

                <div class="row">
                    
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="contact-item green">
                            <i class="icons icon-location-3"></i>
                            <p>1235 N Bellefield Ave,<br /> Pittsburgh, PA 15260</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="contact-item blue">
                            <i class="icons icon-mail"></i>
                            <p><a href="#">info@azizjarir.com</a><br>
<a href="#">sales@azizjarir.com</a>
</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="contact-item orange">
                            <i class="icons icon-phone"></i>
                            <p>800-559-65-80<br>
800-603-60-35
</p>
                        </div>
                    </div>
                    
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="contact-item purple">
                            <i class="icons icon-clock"></i>
                            <p>Monday - Friday: 08.00-20.00<br>
Saturday: 09.00-15.00<br>
Sunday: closed</p>
                        </div>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        
        
        
        
        <div class="col-lg-5 col-md-5 col-sm-5">
            
            <div class="carousel-heading no-margin">
                <h4><?= Html::encode($this->title) ?> Form</h4>
            </div>
            
            <div class="page-content contact-form">
            <?php if (Yii::$app->session->hasFlash('contactFormSubmitted')): ?>

                <div class="alert alert-success">
                    Thank you for contacting us. We will respond to you as soon as possible.
                </div>

            <?php else: ?>

                <p>
                    If you have business inquiries or other questions, please fill out the following form to contact us.
                    Thank you.
                </p>

               

                        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

                            <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>

                            <?= $form->field($model, 'email') ?>

                            <?= $form->field($model, 'subject') ?>

                            <?= $form->field($model, 'body')->textArea(['rows' => 6]) ?>

                            <?= $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                                'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-6">{input}</div></div>',
                            ]) ?>

                            <div class="form-group">
                                <?= Html::submitInput('Send Message', ['class' => 'btn btn-primary big', 'name' => 'contact-button']) ?>
                            </div>

                        <?php ActiveForm::end(); ?>

               

            <?php endif; ?>
                
            </div>
            
        </div>
        
        
    </div>
    
</section>
<!-- /Main Content -->
