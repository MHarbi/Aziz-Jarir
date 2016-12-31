<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
//use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\FullProducts */

$this->title = $model->pname;
$this->params['breadcrumbs'][] = ['label' => 'All products', 'url' => ['full-products/index']];
$this->params['breadcrumbs'][] = ['label' => $model->brand, 'url' => ['full-products/index', 'brand' => $model->brand]];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Main Content -->
<section class="main-content col-lg-12 col-md-12 col-sm-12">
    <?php Pjax::begin(); ?>

        <?= $this->render('_productDetails', [
            'model' => $model,
            'unqOs' => $unqOs,
            'unqColor' => $unqColor
        ]); ?>

    <?php Pjax::end(); ?>
    
</section>
