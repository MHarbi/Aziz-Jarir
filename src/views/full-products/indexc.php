<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
//use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;

/* @var $this yii\web\View */
/* @var $model app\models\FullProducts */

$this->title = isset($_GET['cat']) ? $_GET['cat'] : 'All Categories';
if(isset($_GET['cat'])) $this->params['breadcrumbs'][] = ['label' => 'All Categories', 'url' => ['full-products/indexc']];
$this->params['breadcrumbs'][] = $this->title;
?>

<!-- Main Content -->
<section class="main-content col-lg-9 col-md-9 col-sm-9 col-lg-push-3 col-md-push-3 col-sm-push-3">
        
    <div class="row">
    
        <!-- Heading -->
        <div class="col-lg-12 col-md-12 col-sm-12">
            
            <div class="carousel-heading">
                <h4><?= Html::encode($this->title) ?></h4>
            </div>
            
        </div>
        <!-- /Heading -->
        
    </div>
   
   <div class="row"> 
        <?= 
        ListView::widget([
            'dataProvider' => $productsDataProvider,
            'options' => [
                'tag' => 'div',
                'class' => 'list-wrapper',
                'id' => 'list-wrapper',
            ],
            'layout' => '<div class="row"><div class="category-results col-lg-6 col-md-6 col-sm-6">{summary}</div><div class="col-lg-6 col-md-6 col-sm-6">{pager}</div></div><div class="row">{items}</div><div class="row"><div class="category-results col-lg-6 col-md-6 col-sm-6">{summary}</div><div class="col-lg-6 col-md-6 col-sm-6">{pager}</div></div>',
            'itemView' => function ($model, $key, $index, $widget) {
                return $this->render('_product_item',['model' => $model]);
                //return $model->pname . ' posted by ' . $model->price;
            },
            'pager' => [
                //'firstPageLabel' => 'First',
                //'lastPageLabel' => 'Last',
                //'maxButtonCount' => 4,
                'options' => [
                    'class' => 'pagination'
                ]
            ],
        ]); 
        ?>
        
    </div>
    
    
        
</section>
<!-- /Main Content -->




<!-- Sidebar -->
<aside class="sidebar col-lg-3 col-md-3 col-sm-3  col-lg-pull-9 col-md-pull-9 col-sm-pull-9">
    
    <!-- Categories -->
    <div class="row sidebar-box purple">
        
        <div class="col-lg-12 col-md-12 col-sm-12">
            
            <div class="sidebar-box-heading">
                <i class="icons icon-folder-open-empty"></i>
                <h4>Brands</h4>
            </div>
            
            <div class="sidebar-box-content">
                <ul>
                    <li><a class="purple" href="<?php echo Url::to(['/full-products/index']); ?>">All Brands</a></li>
                    <?php foreach($brands as $brand){ ?>
                    <li><a href="<?php echo Url::to(['/full-products/index', 'brand' => $brand['brand']]); ?>"><?php echo $brand['brand']; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
            
        </div>
            
    </div>
    <!-- /Categories -->
    
    
    <!-- Compare Products -->
    <!--<div class="row sidebar-box blue">
        
        <div class="col-lg-12 col-md-12 col-sm-12">
            
            <div class="sidebar-box-heading">
                <i class="icons icon-docs"></i>
                <h4>Compare Products</h4>
            </div>
            <div class="sidebar-box-content">
                <table class="compare-table">
                    
                    <tr>
                        <td class="product-thumbnail"><img src="img/products/sample1.jpg" alt="Product1"></td>
                        <td class="product-info">
                            <p><a href="#">Lorem ipsum dolor sit amet</a></p>
                            <a href="#" class="remove">Remove</a>
                        </td>
                    </tr>
                    
                </table>
                <div class="padding-box">
                    <a class="button grey">Go to compare</a>
                </div>
            </div>
        </div>
        
    </div>-->
    <!-- /Compare Products -->

    
    
    <!-- Bestsellers -->
    <div class="row sidebar-box red">
        
        <div class="col-lg-12 col-md-12 col-sm-12">
            
            <div class="sidebar-box-heading">
            <i class="icons icon-award-2"></i>
                <h4>Bestsellers</h4>
            </div>
            
            <div class="sidebar-box-content">
                <table class="bestsellers-table">
                    <?php foreach($best_sellers as $item){ ?>
                    <tr>
                        <td class="product-thumbnail"><a href="#"><img src="img/products/<?= (file_exists('img/products/'.$item['picture']))? $item['picture'] : 'sample1.jpg' ?>" alt="<?= $item['pname'] ?>"></a></td>
                        <td class="product-info">
                            <p><a href="<?php echo Url::to(['/full-products/view', 'id' => $item['product_id']]); ?>"><?= $item['pname'] ?></a></p>
                            <span class="price">$<?= $item['price'] ?></span>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
            
        </div>
        
    </div>
    <!-- /Bestsellers -->
    
    
    <!-- Tag Cloud -->
    <div class="row sidebar-box green">
        
        <div class="col-lg-12 col-md-12 col-sm-12">
            
            <div class="sidebar-box-heading">
                <i class="icons icon-tag-6"></i>
                <h4>Tags Cloud</h4>
            </div>
            
            <div class="sidebar-box-content sidebar-padding-box">
                <a href="#" class="tag-item">digital camera</a>
                <a href="#" class="tag-item">lorem</a>
                <a href="#" class="tag-item">gps</a>
                <a href="#" class="tag-item">headphones</a>
                <a href="#" class="tag-item">ipsum</a>
                <a href="#" class="tag-item">laptop</a>
                <a href="#" class="tag-item">smartphone</a>
                <a href="#" class="tag-item">tv</a>
            </div>
                
        </div>
        
    </div>
    <!-- /Tag Cloud -->
    
    
</aside>
<!-- /Sidebar -->
