<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>

<html lang="<?= Yii::$app->language ?>">
<head>
    
    <!-- Meta Tags -->
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    
    <!-- Title -->
    <title>Aziz Jarir | <?= Html::encode($this->title) ?></title>
    
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,900,700italic,500italic' rel='stylesheet' type='text/css'>
    
    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/perfect-scrollbar.css">
    
    <link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="css/fontello.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" type="text/css" href="css/settings.css" media="screen" />
    <link rel="stylesheet" href="css/animation.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/chosen.css">
    
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <link rel="stylesheet" href="css/ie.css">
    <![endif]-->
    <!--[if IE 7]>
        <link rel="stylesheet" href="css/fontello-ie7.css">
    <![endif]-->
    
    <?php $this->head() ?>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
<?php $this->beginBody() ?>
<?php 
$session = Yii::$app->session;
if ($session->isActive)
    $session->open();

//var_dump(\yii\helpers\Json::encode($session['cart'])); return; ?>
<!--<div class="wrap">
</div>-->

<!-- Container -->
<div class="container">

        <!-- Header -->
    <header class="row">
        
        <div class="col-lg-12 col-md-12 col-sm-12">
            
            <!-- Top Header -->
            <div id="top-header">
                
                <div class="row">
                    
                    <nav id="top-navigation" class="col-lg-7 col-md-7 col-sm-7">
                        <ul class="pull-left">
                            <li><a href="<?php echo Url::to(['/site/about']); ?>">About Us</a></li>
                            <li><a href="<?php echo Url::to(['/site/contact']); ?>">Contact</a></li>
                            <?php if(!Yii::$app->user->isGuest) if(Yii::$app->user->identity->user_type=="customer") { ?>
                            <li><a href="<?php echo Url::to(['/transactions/orders', 'customer_id' => Yii::$app->user->identity->id]); ?>">Previous Orders</a></li>
                            <li><a href="<?php echo Url::to(['/customers/view', 'id' => Yii::$app->user->identity->id]); ?>">Profile</a></li>
                            <?php } ?>
                        </ul>
                    </nav>
                    
                    <nav class="col-lg-5 col-md-5 col-sm-5">
                        <ul class="pull-right">
                            <?php if(!Yii::$app->user->isGuest) if(Yii::$app->user->identity->user_type=="salesperson") { ?>
                                <!--<li class="purple"><a href="#"><i class="icons icon-user-3"></i> Manager Login</a></li>-->
                            <?php } ?>

                            <?php if(Yii::$app->user->isGuest) { ?>
                            <li class="purple"><a href="<?= Url::to(['site/manage']) ?>"><i class="icons icon-user-3"></i> Manager Login</a></li>
                            <li class="purple"><a href="#"><i class="icons icon-user-3"></i> Login</a>
                                <ul id="login-dropdown" class="box-dropdown">
                                    <li>
                                        <div class="box-wrapper">
                                            <h4>LOGIN</h4>

                                            <?php $modelLogin = new app\models\LoginForm();
                                                $form = ActiveForm::begin([
                                                    'action' => ['/site/login'],
                                                    'id' => 'login-form',
                                            ]); ?>
                                            
                                            <div class="iconic-input">
                                                <?= $form->field($modelLogin, 'username', ['inputOptions' => ['placeholder' => $modelLogin->getAttributeLabel('username')]])->label(false); ?>
                                                <i class="icons icon-user-3"></i>
                                            </div>
                                            <div class="iconic-input">

                                                <?= $form->field($modelLogin, 'password')->passwordInput(['placeholder' => $modelLogin->getAttributeLabel('password')])->label(false); ?>
                                                <i class="icons icon-lock"></i>
                                            </div>
                                            <?= $form->field($modelLogin, 'rememberMe')->checkbox([
                                                'template' => "{input} {label} {error}",
                                            ]) ?>
                                            <br />
                                            <br />
                                            <div class="pull-left">
                                                <?= Html::submitInput('Login', ['class' => 'orange', 'name' => 'login-button']) ?>
                                            </div>
                                            <?php ActiveForm::end(); ?>

                                            <div class="pull-right">
                                                <a href="#">Forgot your password?</a>
                                                <br>
                                                <a href="#">Forgot your username?</a>
                                                <br>
                                            </div>
                                            <br class="clearfix">
                                        </div>
                                        <div class="footer">
                                            <h4 class="pull-left">NEW CUSTOMER?</h4>
                                            <a class="button pull-right" href="<?php echo Url::to(['/customers/create']); ?>">Create an account</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="<?php echo Url::to(['/customers/create']); ?>"><i class="icons icon-lock"></i> Create an Account</a></li>
                            <?php } else { ?>
                            <li class="purple">

                            <!--<a href="<?php //echo Url::to(['/site/logout']); ?>"><i class="icons icon-user-3"></i> <?php //echo 'Logout (' . Yii::$app->user->identity->username . ')'; ?></a>-->
                            <?php
                            echo Html::beginForm(['/site/logout'], 'post')
                                    . Html::submitButton(
                                        '<i class="icons icon-user-3"></i> Logout (' . Yii::$app->user->identity->username . ')',
                                            ['class' => '', 'style' => 'padding: 0; border:0; font:auto; outline: none;box-sizing: none; background-color: transparent; ']
                                        )
                                    . Html::endForm();
                             } ?>
                        </ul>
                    </nav>
                    
                </div>
                
            </div>
            <!-- /Top Header -->

            <!-- Main Header -->
            <div id="main-header">
                
                <div class="row">
                    
                    <div id="logo" class="col-lg-4 col-md-4 col-sm-4">
                        <a href="<?php echo Url::home(); ?>" style="text-decoration: none;"><img height="37" src="img/logo.png" alt="Smartphnes"><span style="color: #E54D42; font-size: 25px; font-weight: bold;">AZIZ </span><span style="color: #34495e; font-size: 25px; font-weight: bold;">JARIR</span></a>
                    </div>
                    
                    <nav id="middle-navigation" class="col-lg-8 col-md-8 col-sm-8">
                        <ul class="pull-right">
                            <!--<li class="blue">
                                <a href="compare_products.html"><i class="icons icon-docs"></i>0 Items</a>
                            </li>-->
                            <!--<li class="red">
                                <a href="wishlist.html"><i class="icons icon-heart-empty"></i>2 Items</a>
                            </li>-->
                            <li class="orange"><a href="<?= Url::to(['site/cart']); ?>"><i class="icons icon-basket-2"></i><span id="count_cart">0</span> Items</a>
                                <ul id="cart-dropdown" class="box-dropdown parent-arrow">
                                    <li>
                                        <div class="box-wrapper parent-border">
                                            <p>Recently added item(s)</p>
                                            
                                            <div id="cart-div" style="padding: 0; margin: 0">
                                                
                                                <?php
                                                        $session = Yii::$app->session;
                                                        if ($session->isActive)
                                                            $session->open();
                                                        if(!isset($session['cart'])) $session['cart'] = array();

                                                        if(isset($session['cart'])){

                                                             $cartarr = $session['cart'];
                                                             $cart_total = 0.0;
                                                             $cart_length = sizeof($cartarr);
                                                ?>
                                                             <table class="cart-table">
                                                <?php
                                                             foreach ($cartarr as $item) { ?>

                                                            <?php $cart_total += ($item['quantity'] * $item['price']); ?>
                                                            <tr id="<?= $item['id'] ?>">
                                                                <td><img src="img/products/<?= $item['picture'] ?>" alt="<?= $item['pname'] ?>"></td>
                                                                <td>
                                                                    <h6><?= $item['pname'] ?></h6>
                                                                    <p><?= $item['product_id'] ?> | <?= $item['color'] ?> | <?= $item['os'] ?></p>
                                                                </td>
                                                                <td>
                                                                    <span class="quantity"><span class="light"><?= $item['quantity'] ?> x</span> $<?= $item['price'] ?></span>
                                                                    <!--<a href=\"#\" class=\"parent-color\">Remove</a>-->
                                                                </td>
                                                            </tr>
                                                        
                                                                
                                                <?php       } ?>
                                                            </table>
                                                <?php
                                                        }
                                                        $script = <<< JS

                                                            $("#count_cart").html($cart_length);
                                                            $("#cart-total").html($cart_total);

JS;

                                                        $this->registerJs($script, yii\web\View::POS_END);
                                                 ?>

                                            </div>
                                            
                                            <br class="clearfix">
                                        </div>
                                        
                                        <div class="footer">
                                            <table class="checkout-table pull-right">
                                                <!--<tr>
                                                    <td class="align-right">Tax:</td>
                                                    <td>$0.00</td>
                                                </tr>-->
                                                <!--<tr>
                                                    <td class="align-right">Total:</td>
                                                    <td>$37.00</td>
                                                </tr>-->
                                                <tr>
                                                    <td class="align-right"><strong>Total:</strong></td>
                                                    <td><strong class="parent-color"><span id="cart-total"></span></strong></td>
                                                </tr>
                                            </table>
                                        </div>
                                        
                                        <div class="box-wrapper no-border">
                                            <a class="button pull-right parent-background" href="<?= Url::to(["site/cart"]) ?>">Checkout</a>
                                            <a class="button pull-right" href="<?= Url::to(["site/cart"]) ?>">View Cart</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                    
                </div>
                
            </div>
            <!-- /Main Header -->
            
            
            <!-- Main Navigation -->
            <nav id="main-navigation" class="style1">
                <ul>
                    
                    <li class="home-green current-item">
                        <a href="<?php echo Url::home(); ?>">
                            <i class="icons icon-shop-1"></i>
                            <span class="nav-caption">Home</span>
                            <span class="nav-description"></span>
                        </a>
                    </li>
                    
                    <li class="blue">
                        <a href="<?php echo Url::to(['/full-products/indexc', 'cat' => 'Tablet']); ?>">
                            <i class="icons icon-desktop-3"></i>
                            <span class="nav-caption">Tablets</span>
                            <span class="nav-description">Laptops & Tablets</span>
                        </a>
                    </li>
                    
                    <li class="orange">
                        <a href="<?php echo Url::to(['/full-products/indexc', 'cat' => 'Smartphones']); ?>">
                            <i class="icons icon-mobile-6"></i>
                            <span class="nav-caption">Smart phones</span>
                            <span class="nav-description">Phones</span>
                        </a>
                    </li>
                    
                    <li class="green">
                        <a href="<?php echo Url::to(['/site/blog']); ?>">
                            <i class="icons icon-pencil-7"></i>
                            <span class="nav-caption">Blog</span>
                            <span class="nav-description">News & Reviews</span>
                        </a>
                    </li>
                    
                    <li class="purple">
                        <a href="<?php echo Url::to(['/site/contact']); ?>">
                            <i class="icons icon-location-7"></i>
                            <span class="nav-caption">Contact</span>
                            <span class="nav-description">Store Locations</span>
                        </a>
                    </li>
                    
                    <li class="nav-search">
                            <i class="icons icon-search-1"></i>
                    </li>
                    
                </ul>
                
                <div id="search-bar">
                    <form action="<?= Url::to(['full-products/search']) ?>" method="post" >
                    <input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <table id="search-bar-table">
                            <tr>
                                <td class="search-column-1">
                                    <p><span class="grey">What are you looking for?</span></p>
                                    <!--<p><span class="grey">Popular Searches:</span> <a href="#">accessories</a>, <a href="#">audio</a>, <a href="#">camera</a>, <a href="#">phone</a>, <a href="#">storage</a>, <a href="#">more</a></p>-->
                                    <input type="text" name="keyword" placeholder="Enter your keyword">
                                </td>
                                <!--<td class="search-column-2">
                                    <p class="align-right"><a href="#">Advanced Search</a></p>
                                    <select class="chosen-select-search">
                                        <option>All Categories</option>
                                        <option>All Categories</option>
                                        <option>All Categories</option>
                                        <option>All Categories</option>
                                        <option>All Categories</option>
                                    </select>
                                </td>-->
                            </tr>
                        </table>
                    </div>
                    <div id="search-button">
                        <input type="submit" value="">
                        <i class="icons icon-search-1"></i>
                    </div>
                    </form>
                </div>
                
            </nav>
            <!-- /Main Navigation -->
            
        </div>
        
    </header>
    <!-- /Header -->

    <!-- Content -->
    <div class="row content">
     <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    <?= $content ?>
    </div>
    <!-- /Content -->

    <!-- Banner -->
    <section class="banner">
        
        <div class="left-side-banner banner-item icon-on-right gray">
            <h4>8(802)234-5678</h4>
            <p>Monday - Saturday: 8am - 5pm PST</p>
            <i class="icons icon-phone-outline"></i>
        </div>
        
        <a href="#">
        <div class="middle-banner banner-item icon-on-left light-blue">
            <h4>Free shipping</h4>
            <p>on all orders over $99</p>
            <!--<span class="button">Learn more</span>-->
            <i class="icons icon-truck-1"></i>
        </div>
        </a>
        
        <a href="#">
        <div class="right-side-banner banner-item orange">
            <h4>Crazy sale!</h4>
            <p>on selected items</p>
            <!--<span class="button">Shop now</span>-->
        </div>
        </a>
        
    </section>
    <!-- /Banner -->

    
    <!-- Footer -->
    <footer id="footer" class="row">
        
        <!-- Upper Footer -->
        <div class="col-lg-12 col-md-12 col-sm-12">
            
            <div id="upper-footer">
            
                <div class="row">
                    
                    <!-- Newsletter -->
                    <div class="col-lg-7 col-md-7 col-sm-7">
                        <!--<form id="newsletter" action="php/newsletter.php">
                            <h4>Newsletter Sign Up</h4>
                            <input type="text" name="newsletter-email" placeholder="Enter your email address">
                            <input type="submit" name="newsletter-submit" value="Submit">
                        </form>-->
                    </div>
                    <!-- /Newsletter -->
                    
                    
                    <!-- Social Media -->
                    <div class="col-lg-5 col-md-5 col-sm-5 social-media">
                        <h4>Stay Connected</h4>
                        <ul>
                            <li class="social-googleplus tooltip-hover" data-toggle="tooltip" data-placement="top" title="Google+"><a href="#"></a></li>
                            <li class="social-facebook tooltip-hover" data-toggle="tooltip" data-placement="top" title="Facebook"><a href="#"></a></li>
                            <li class="social-pinterest tooltip-hover" data-toggle="tooltip" data-placement="top" title="Pinterest"><a href="#"></a></li>
                            <li class="social-twitter tooltip-hover" data-toggle="tooltip" data-placement="top" title="Twitter"><a href="#"></a></li>
                            <li class="social-youtube tooltip-hover" data-toggle="tooltip" data-placement="top" title="Youtube"><a href="#"></a></li>
                        </ul>
                    </div>
                    <!-- /Social Media -->
                    
                </div>
            
            </div>
            
        </div>
        <!-- /Upper Footer -->
        
        
        
        <!-- Main Footer -->
        <div class="col-lg-12 col-md-12 col-sm-12">
            
            <div id="main-footer">
            
                <div class="row">
                    
                    <!-- The Service -->
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <h4>The Service</h4>
                        <ul>
                            <li>Soon!</li>
                            <!--<li><a href="#"><i class="icons icon-right-dir"></i> My account</a></li>
                            <li><a href="#"><i class="icons icon-right-dir"></i> Order history</a></li>
                            <li><a href="#"><i class="icons icon-right-dir"></i> Vendor contact</a></li>
                            <li><a href="#"><i class="icons icon-right-dir"></i> Shop page</a></li>
                            <li><a href="#"><i class="icons icon-right-dir"></i> Categories</a></li>
                            <li><a href="#"><i class="icons icon-right-dir"></i> Search results</a></li>-->
                        </ul>
                    </div>
                    <!-- /The Service -->
                    
                    
                    <!-- Like us on Facebook -->
                    <div class="col-lg-3 col-md-3 col-sm-6 facebook-iframe">
                        <h4>Like us on Facebook</h4>
                        <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FFacebookDevelopers&amp;width=270&amp;height=250&amp;colorscheme=light&amp;header=false&amp;show_faces=true&amp;stream=false&amp;show_border=false" style="border:none; overflow:hidden; width:100%; height:290px;"></iframe>
                    </div>
                    <!-- /Like us on Facebook -->
                    
                    
                    <!-- Information -->
                    <div class="col-lg-3 col-md-3 col-sm-6">
                        <h4>Information</h4>
                        <ul>
                            <li><a href="<?php echo Url::to(['/site/about']); ?>"><i class="icons icon-right-dir"></i> About Us</a></li>
                            <!--<li><a href="#"><i class="icons icon-right-dir"></i> New Collection</a></li>
                            <li><a href="#"><i class="icons icon-right-dir"></i> Bestsellers</a></li>-->
                            <li><a href="<?php echo Url::to(['/site/policy']); ?>"><i class="icons icon-right-dir"></i> Privacy Policy</a></li>
                            <li><a href="<?php echo Url::to(['/site/terms']); ?>"><i class="icons icon-right-dir"></i> Terms &amp; Conditions</a></li>
                        </ul>
                    </div>
                    <!-- /Information -->
                    
                    
                    <!-- Contact Us -->
                    <div class="col-lg-3 col-md-3 col-sm-6 contact-footer-info">
                        <h4>Contact Us</h4>
                        <ul>
                            <li><i class="icons icon-location"></i> 1235 N Bellefield Ave,<br /> Pittsburgh, PA 15260</li>
                            <li><i class="icons icon-phone"></i> +1 800 603 6035</li>
                            <li><i class="icons icon-mail-alt"></i><a href="mailto:mail@company.com"> mail@azizjarir.com</a></li>
                            <li><i class="icons icon-skype"></i> AzizJarir</li>
                        </ul>
                    </div>
                    <!-- /Contact Us -->
                    
                </div>
                
            </div>
            
        </div>
        <!-- /Main Footer -->
        
        
        
        <!-- Lower Footer -->
        <div class="col-lg-12 col-md-12 col-sm-12">
            
            <div id="lower-footer">
            
                <div class="row">
                    
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <p class="copyright">Copyright <?= date('Y') ?> &copy; <a href="#">Aziz Jarir</a>. All Rights Reserved. | <?= Yii::powered() ?></p>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6"> 
                        <ul class="payment-list">
                            <li class="payment1"></li>
                            <li class="payment2"></li>
                            <li class="payment3"></li>
                            <li class="payment4"></li>
                            <li class="payment5"></li>
                        </ul>
                    </div>
                    
                </div>
                
            </div>
            
        </div>
        <!-- /Lower Footer -->
        
    </footer>
    <!-- Footer -->
    
    
    <div id="back-to-top">
        <i class="icon-up-dir"></i>
    </div>
    
</div>
<!-- Container -->




<?php $this->endBody() ?>
    <!-- JavaScript -->
    <script src="js/modernizr.min.js"></script>
    <!--<script src="js/jquery-1.11.0.min.js"></script>-->
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <script type="text/javascript" src="js/jquery.raty.min.js"></script>
    
    <!-- Scroll Bar -->
    <script src="js/perfect-scrollbar.min.js"></script>
    
    <!-- Cloud Zoom -->
    <script src="js/zoomsl-3.0.min.js"></script>
    
    <!-- FancyBox -->
    <script src="js/jquery.fancybox.pack.js"></script>
    
    <!-- jQuery REVOLUTION Slider  -->
    <script type="text/javascript" src="js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>

    <!-- FlexSlider -->
    <script defer src="js/flexslider.min.js"></script>
    
    <!-- IOS Slider -->
    <script src = "js/jquery.iosslider.min.js"></script>
    
    <!-- noUi Slider -->
    <script src="js/jquery.nouislider.min.js"></script>
    
    <!-- Owl Carousel -->
    <script src="js/owl.carousel.min.js"></script>
    
    <!-- Cloud Zoom -->
    <script src="js/zoomsl-3.0.min.js"></script>
    
    <!-- SelectJS -->
    <script src="js/chosen.jquery.min.js" type="text/javascript"></script>
    
    <!-- Main JS -->
    <script defer src="js/bootstrap.min.js"></script>
    <script src="js/main-script.js"></script>

    <script type="text/javascript">
        //$(".chzn-select").chosen().change(function() {
          //  alert($(this).val());
            //$('#' + $(this).val()).show();
        //});
    </script>
      
</body>
</html>
<?php $this->endPage() ?>
