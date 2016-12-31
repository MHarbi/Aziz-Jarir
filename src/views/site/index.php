<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'Home';
?>
<!-- Main Content -->
<section class="main-content col-lg-9 col-md-9 col-sm-9 col-lg-push-3 col-md-push-3 col-sm-push-3">
    
    <section class="slider">
        <div class="tp-banner-container">
            <div class="tp-banner" >
                <ul>
                    <!-- SLIDE  -->
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
                        <!-- MAIN IMAGE -->
                        <img src="img/slide1.jpg"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <div class="tp-caption skewfromrightshort fadeout"
                            data-x="40"
                            data-y="60"
                            data-speed="500"
                            data-start="1200"
                            data-easing="Power4.easeOut"><h2><strong>iPad Pro</strong></h2>
                        </div>
                        <div class="tp-caption skewfromrightshort fadeout"
                            data-x="40"
                            data-y="140"
                            data-speed="500"
                            data-start="1200"
                            data-easing="Power4.easeOut"><h3>All the power in your hands!</h3>
                        </div>
                        <div class="tp-caption skewfromrightshort fadeout"
                            data-x="40"
                            data-y="250"
                            data-speed="500"
                            data-start="1200"
                            data-easing="Power4.easeOut"><span>From <span class="price">$795.00</span></span>
                        </div>
                        <div class="tp-caption skewfromrightshort fadeout"
                            data-x="40"
                            data-y="300"
                            data-speed="500"
                            data-start="1200"
                            data-easing="Power4.easeOut"><a class="button big red" href="<?php echo Url::to(['/full-products/view', 'id' => 13]); ?>">Buy Now</a>
                        </div>
                    </li>
                    <!-- SLIDE  -->
                    <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000" >
                        <!-- MAIN IMAGE -->
                        <img src="img/slide3.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <div class="tp-caption skewfromrightshort fadeout"
                            data-x="40"
                            data-y="60"
                            data-speed="500"
                            data-start="1200"
                            data-easing="Power4.easeOut"><h2>The New <strong>Smartphones</strong></h2>
                        </div>
                        <div class="tp-caption skewfromrightshort fadeout"
                            data-x="40"
                            data-y="190"
                            data-speed="500"
                            data-start="1200"
                            data-easing="Power4.easeOut"><h3>iPhone 6s</h3>
                        </div>
                        <div class="tp-caption skewfromrightshort fadeout"
                            data-x="40"
                            data-y="300"
                            data-speed="500"
                            data-start="1200"
                            data-easing="Power4.easeOut"><span>Only <span class="price">$360.65</span></span>
                        </div>
                        <div class="tp-caption skewfromrightshort fadeout"
                            data-x="40"
                            data-y="347"
                            data-speed="500"
                            data-start="1200"
                            data-easing="Power4.easeOut"><a class="button big red" href="<?php echo Url::to(['/full-products/view', 'id' => 1]); ?>">Shop Now</a>
                        </div>
                    </li>
                    <!-- SLIDE  -->
                    <li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000" >
                        <!-- MAIN IMAGE -->
                        <img src="img/slide2.jpg"  alt="darkblurbg"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                        <!-- LAYERS -->
                        <div class="tp-caption skewfromrightshort fadeout"
                            data-x="40"
                            data-y="60"
                            data-speed="500"
                            data-start="1200"
                            data-easing="Power4.easeOut"><h2>The New <strong>Tablets</strong></h2>
                        </div>
                        <div class="tp-caption skewfromrightshort fadeout"
                            data-x="40"
                            data-y="140"
                            data-speed="500"
                            data-start="1200"
                            data-easing="Power4.easeOut"><h3>All the power in your hands!</h3>
                        </div>
                        <div class="tp-caption skewfromrightshort fadeout"
                            data-x="40"
                            data-y="250"
                            data-speed="500"
                            data-start="1200"
                            data-easing="Power4.easeOut"><span>From <span class="price">$990.00</span></span>
                        </div>
                        <div class="tp-caption skewfromrightshort fadeout"
                            data-x="40"
                            data-y="300"
                            data-speed="500"
                            data-start="1200"
                            data-easing="Power4.easeOut"><a class="button big red" href="<?php echo Url::to(['/full-products/indexc', 'cat' => 'Tablet']); ?>">Buy Now</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    
    
    
    <!-- Featured Products -->
    <div class="products-row row">
        
        <!-- Carousel Heading -->
        <div class="col-lg-12 col-md-12 col-sm-12">
            
            <div class="carousel-heading">
                <h4>Featured Products</h4>
                <div class="carousel-arrows">
                    <i class="icons icon-left-dir"></i>
                    <i class="icons icon-right-dir"></i>
                </div>
            </div>
            
        </div>
        <!-- /Carousel Heading -->

        <!-- Carousel -->
        <div class="carousel owl-carousel-wrap col-lg-12 col-md-12 col-sm-12">
            
            <div class="owl-carousel" data-max-items="3">
                    
                    <?php foreach($best_sellers as $item){ ?>
                    <!-- Slide -->
                    <div>
                        <!-- Carousel Item -->
                        <div class="product">
                            
                            <div class="product-image">
                                <!--<span class="product-tag">Sale</span>-->
                                <img width="270" height="270" src="img/products/<?= (file_exists('img/products/'.$item['picture']))? $item['picture'] : 'sample4.jpg' ?>" alt="Product1">
                                
                            </div>

                            <div class="product-info">
                                <h5><a href="<?php echo Url::to(['/full-products/view', 'id' => $item['product_id']]); ?>"><?= $item['pname'] ?></a></h5>
                                <span class="price">$<?= $item['price'] ?></span>
                            </div>
                            
                            <!--<div class="product-actions">
                                <span class="add-to-cart">
                                    <span class="action-wrapper">
                                        <i class="icons icon-basket-2"></i>
                                        <span class="action-name">Add to cart</span>
                                    </span >
                                </span>
                            </div>-->
                            
                        </div>
                        <!-- /Carousel Item -->
                    </div>
                    <!-- /Slide -->
                    <?php } ?> 
            </div>
        </div>
        <!-- /Carousel -->
        
    </div>
    <!-- /Featured Products -->
    
    
    
    
    <!-- New Collection -->
    <div class="products-row row">
        
        <!-- Carousel Heading -->
        <div class="col-lg-12 col-md-12 col-sm-12">
            
            <div class="carousel-heading">
                <h4>New Collection</h4>
                <div class="carousel-arrows">
                    <i class="icons icon-left-dir"></i>
                    <i class="icons icon-right-dir"></i>
                </div>
            </div>
            
        </div>
        <!-- /Carousel Heading -->
        
        <!-- Carousel -->
        <div class="carousel owl-carousel-wrap col-lg-12 col-md-12 col-sm-12">
            
            <div class="owl-carousel" data-max-items="3">
                    
                    <?php foreach($new_collection as $item){ ?>
                    <!-- Slide -->
                    <div>
                        <!-- Carousel Item -->
                        <div class="product">
                            
                            <div class="product-image">
                                <!--<span class="product-tag">Sale</span>-->
                                <img width="270" height="270" src="img/products/<?= (file_exists('img/products/'.$item['picture']))? $item['picture'] : 'sample4.jpg' ?>" alt="Product1">
                                
                            </div>

                            <div class="product-info">
                                <h5><a href="<?php echo Url::to(['/full-products/view', 'id' => $item['product_id']]); ?>"><?= $item['pname'] ?></a></h5>
                                <span class="price">$<?= $item['min_price'] ?></span>
                            </div>
                            
                            <!--<div class="product-actions">
                                <span class="add-to-cart">
                                    <span class="action-wrapper">
                                        <i class="icons icon-basket-2"></i>
                                        <span class="action-name">Add to cart</span>
                                    </span >
                                </span>
                            </div>-->
                            
                        </div>
                        <!-- /Carousel Item -->
                    </div>
                    <!-- /Slide -->
                    <?php } ?> 
            </div>
        </div>
        <!-- /Carousel -->
        
    </div>
    <!-- /New Collection -->
    



    
    <!-- Random Products -->
    <div class="products-row row">
        
        <!-- Carousel Heading -->
        <div class="col-lg-12 col-md-12 col-sm-12">
            
            <div class="carousel-heading">
                <h4>Random Products</h4>
                <div class="carousel-arrows">
                    <i class="icons icon-left-dir"></i>
                    <i class="icons icon-right-dir"></i>
                </div>
            </div>
            
        </div>
        <!-- /Carousel Heading -->
        
        <!-- Carousel -->
        <div class="carousel owl-carousel-wrap col-lg-12 col-md-12 col-sm-12">
            
            <div class="owl-carousel" data-max-items="3">
                    
                    <?php foreach($random_products as $item){ ?>
                    <!-- Slide -->
                    <div>
                        <!-- Carousel Item -->
                        <div class="product">
                            
                            <div class="product-image">
                                <!--<span class="product-tag">Sale</span>-->
                                <img width="270" height="270" src="img/products/<?= (file_exists('img/products/'.$item['picture']))? $item['picture'] : 'sample4.jpg' ?>" alt="Product1">
                                
                            </div>

                            <div class="product-info">
                                <h5><a href="<?php echo Url::to(['/full-products/view', 'id' => $item['product_id']]); ?>"><?= $item['pname'] ?></a></h5>
                                <span class="price">$<?= $item['min_price'] ?></span>
                            </div>
                            
                            <!--<div class="product-actions">
                                <span class="add-to-cart">
                                    <span class="action-wrapper">
                                        <i class="icons icon-basket-2"></i>
                                        <span class="action-name">Add to cart</span>
                                    </span >
                                </span>
                            </div>-->
                            
                        </div>
                        <!-- /Carousel Item -->
                    </div>
                    <!-- /Slide -->
                    <?php } ?> 
            </div>
        </div>
        <!-- /Carousel -->
        
    </div>
    <!-- /Random Products -->
    
    


    <!-- Product Brands -->
    <div class="products-row row">
        
        <!-- Carousel Heading -->
        <div class="col-lg-12 col-md-12 col-sm-12">
            
            <div class="carousel-heading">
                <h4>Product Brands</h4>
                <div class="carousel-arrows">
                    <i class="icons icon-left-dir"></i>
                    <i class="icons icon-right-dir"></i>
                </div>
            </div>
            
        </div>
        <!-- /Carousel Heading -->
        
        <!-- Carousel -->
        <div class="carousel owl-carousel-wrap col-lg-12 col-md-12 col-sm-12">
            
            <div class="owl-carousel" data-max-items="5">
                    
                    <!-- Slide -->
                    <div>
                        <div class="product">
                            <a href="#"><img src="img/brands/apple.jpg" alt="Brand1"></a>
                        </div>
                    </div>
                    <!-- /Slide -->
                    
                    <!-- Slide -->
                    <div>
                        <div class="product">
                            <a href="#"><img src="img/brands/htc.jpg" alt="Brand1"></a>
                        </div>
                    </div>
                    <!-- /Slide -->
                    
                    <!-- Slide -->
                    <div>
                        <div class="product">
                            <a href="#"><img src="img/brands/samsung.jpg" alt="Brand1"></a>
                        </div>
                    </div>
                    <!-- /Slide -->
                    
                    <!-- Slide -->
                    <div>
                        <div class="product">
                            <a href="#"><img src="img/brands/nokia.jpg" alt="Brand1"></a>
                        </div>
                    </div>
                    <!-- /Slide -->
                    
                    
            
            </div>
            
        </div>
        <!-- /Carousel -->
        
    </div>
    <!-- /Product Brands -->
    
        
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
    <!--
    <div class="row sidebar-box blue">
        
        <div class="col-lg-12 col-md-12 col-sm-12">
            
            <div class="sidebar-box-heading">
                <i class="icons icon-docs"></i>
                <h4>Compare Products</h4>
            </div>
            
            <div class="sidebar-box-content sidebar-padding-box">
                <p>You have no products to compare.</p>
            </div>
            
        </div>
        
    </div>
    -->
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
                    
                    <tr>
                        <td class="product-thumbnail"><a href="#"><img src="img/products/sample1.jpg" alt="Product1"></a></td>
                        <td class="product-info">
                            <p><a href="#">Lorem ipsum dolor sit amet</a></p>
                            <span class="price">$550.00</span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="product-thumbnail"><a href="#"><img src="img/products/sample2.jpg" alt="Product1"></a></td>
                        <td class="product-info">
                            <p><a href="#">Lorem ipsum dolor sit amet</a></p>
                            <span class="price">$550.00</span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="product-thumbnail"><a href="#"><img src="img/products/sample3.jpg" alt="Product1"></a></td>
                        <td class="product-info">
                            <p><a href="#">Lorem ipsum dolor sit amet</a></p>
                            <div class="rating readonly-rating" data-score="4"></div>
                            <span class="price"><del>$650.00</del> $550.00</span>
                        </td>
                    </tr>
                    
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
