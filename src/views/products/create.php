<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = 'New Product';
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Main Content -->
<section class="main-content col-lg-12 col-md-12 col-sm-12">
    
    <div class="row">
    	
        <div class="col-lg-12 col-md-12 col-sm-12">
        	
            <div class="carousel-heading no-margin">
                <h4><?= Html::encode($this->title) ?></h4>
            </div>
            
            <div class="page-content">

            <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>

            </div>
            
    	</div>
          
    </div>
        
    
</section>
<!-- /Main Content -->