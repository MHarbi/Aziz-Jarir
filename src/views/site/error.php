<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;

$this->title = $name;
?>
<!-- Main Content -->
<section class="main-content col-lg-12 col-md-12 col-sm-12">
    
    
    <div class="row">
        
        <div class="col-lg-12 col-md-12 col-sm-12">
            
            <div class="carousel-heading no-margin">
                <h4><?= Html::encode($this->title) ?></h4>
            </div>
            
            <div class="page-content">
                
                <div class="alert alert-danger">
                    <?= nl2br(Html::encode($message)) ?>
                </div>

                <p>
                    The above error occurred while the Web server was processing your request.
                </p>
                <p>
                    Please contact us if you think this is a server error. Thank you.
                </p>
                
            </div>
            
        </div>
          
    </div>
        
    
</section>
<!-- /Main Content -->