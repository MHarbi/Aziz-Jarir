<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
//use kartik\grid\GridView;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\widgets\Pjax;
use yii\web\View;

?>

    <!-- Product -->
    <div class="product-single">
        
        <div class="row">
            
            <!-- Product Images Carousel -->
            <div class="col-lg-4 col-md-4 col-sm-4 product-single-image">
                
                <div id="product-slider">
                    <ul class="slides">
                        <li>
                            <img class="cloud-zoom" src="img/products/<?= (file_exists('img/products/'.$model->picture))? $model->picture : 'single1.jpg' ?>" data-large="img/products/<?= (file_exists('img/products/'.$model->picture))? $model->picture : 'sample1.jpg' ?>"  alt=""/>
                            <a class="fullscreen-button" href="img/products/<?= (file_exists('img/products/'.$model->picture))? $model->picture : 'single1.jpg' ?>">
                                <div class="product-fullscreen">
                                    <i class="icons icon-resize-full-1"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <div id="product-carousel">
                    <ul class="slides">
                        <li>
                            <a class="fancybox" rel="product-images" href="img/products/<?= (file_exists('img/products/'.$model->picture))? $model->picture : 'single1.jpg' ?>"></a>
                            <img src="img/products/<?= (file_exists('img/products/'.$model->picture))? $model->picture : 'single1.jpg' ?>" data-large="img/products/<?= (file_exists('img/products/'.$model->picture))? $model->picture : 'single1.jpg' ?>" alt=""/>
                        </li>
                    </ul>
                    <div class="product-arrows">
                        <div class="left-arrow">
                            <i class="icons icon-left-dir"></i>
                        </div>
                        <div class="right-arrow">
                            <i class="icons icon-right-dir"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Product Images Carousel -->
            
            <div class="col-lg-8 col-md-8 col-sm-8 product-single-info full-size">
                
                <h2><?= $model->pname ?></h2>
                <div class="rating-box"><hr/>
                    <!--<div class="rating readonly-rating" data-score="4"></div>
                    2 Review(s)-->
                </div>
                <table>
                    <tr>
                        <td>Manufacturer</td>
                        <td><a href="#"><?= $model->brand ?></a></td>
                    </tr>
                    <tr>
                        <td>Availability</td>
                        <td>
                            <?php if($model->inventory_amount == '0'){ ?>
                                <span class="red">SOLD OUT</span>
                            <?php } else { ?>
                            <span class="green">in stock</span> <?= $model->inventory_amount ?> items
                            <?php } ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Product code</td>
                        <td id="product_id"><?= $model->product_id ?></td>
                    </tr>
                    <tr>
                        <td>Product kind</td>
                        <td><?= $model->product_kind ?></td>
                    </tr>   
                </table>
                
                <strong>Specefications</strong>
                <table>
                    <tr>
                        <td>Memory</td>
                        <td><?= $model->memory ?></td>
                    </tr>
                    <tr>
                        <td>Processor</td>
                        <td><?= $model->processor ?></td>
                    </tr>
                    <tr>
                        <td>Screen</td>
                        <td><?= $model->screen ?></td>
                    </tr>
                </table>
                
                <span class="price"><!--<del>$381.00</del>--> $<?= $model->price ?></span>
                
                <?= Html::beginForm('#', 'post', ['data-pjax' => '', 'class' => 'form-inline']); ?>

                <table class="product-actions-single">
                    <tr>
                        <td>Operating System:</td>
                        <td>
                            <select class="chzn-select" id="os" name="os">
                                <?php foreach($unqOs as $Os) { ?>
                                <option value="<?= $Os->os ?>"><?= $Os->os ?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>Color:</td>
                        <td>
                            <select class="chzn-select" id="color" name="color">
                                <?php foreach($unqColor as $Color) { ?>
                                <option value="<?= $Color->color ?>"><?= $Color->color ?></option>
                                <?php } ?>
                            </select>
                        </td>
                    </tr>
                </table>

                <table class="product-actions-single">
                    <tr>
                        <td>Quantity:</td>
                        <td>
                            <div class="numeric-input">
                                <input id="quantity" disabled="disabled" type="text" maxvalue="<?= $model->inventory_amount ?>" value="<?= ($model->inventory_amount == '0')? '0': '1'; ?>">
                                <span class="arrow-up"><i class="icons icon-up-dir"></i></span>
                                <span class="arrow-down"><i class="icons icon-down-dir"></i></span>
                            </div>
                            <a id="add-to-cart" href="<?= Url::to(["/full-products/add-to-cart"]) ?>" style="<?= ($model->inventory_amount == '0')? 'pointer-events: none;': ''; ?>">
                                <span class="add-to-cart" style="<?= ($model->inventory_amount == '0')? 'background-color: #eee; ': ''; ?>">
                                    <span class="action-wrapper">
                                        <i class="icons icon-basket-2"></i>
                                        <span class="action-name">Add to cart</span>
                                    </span>
                                </span>
                            </a>
                        </td>
                    </tr>
                </table> 

                <?= Html::endForm() ?>

                <?php if($model->inventory_amount != '0'){ ?>

               <!-- <div class="product-actions">
                    <span class="add-to-favorites">
                        <span class="action-wrapper">
                            <i class="icons icon-heart-empty"></i>
                            <span class="action-name">Add to wishlist</span>
                        </span>
                    </span>
                    <span class="add-to-compare">
                        <span class="action-wrapper">
                            <i class="icons icon-docs"></i>
                            <span class="action-name">Add to compare</span>
                        </span>
                    </span>
                    <span class="green product-action">
                        <span class="action-wrapper">
                            <i class="icons icon-info"></i>
                            <span class="action-name">Ask a question</span>
                        </span>
                    </span>-->
                </div>
                <?php } ?>
                <div class="social-share"> </div>
                
            </div>
            
        </div>
        
    </div>
    <!-- /Product -->
    <?php
        $script = <<< JS
        $(document).ready(function() {
            $(".chzn-select").chosen().change(function() {
                //alert($(this).val());
                $('.numeric-input').find('.arrow-up').unbind('click');
                    
                $('.numeric-input').find('.arrow-up').unbind('click');
                $(this).submit();
            });
            $("#color").val('$model->color');
            $("#os").val('$model->os');
            $('#color').trigger('chosen:updated');
            $('#os').trigger('chosen:updated');

            /* Product Actions Accordion */
            var productButtons = $('.product-actions').not('.full-width');
            productButtons.find('>span:first-child').addClass('current');
            
            productButtons.find('>span').hover(function(){
                
                $(this).parent().find('>span').removeClass('current');
                $(this).addClass('current');
                
            }, function(){
                
                $(this).removeClass('current');
                
            });
            
            productButtons.hover(function(){
                
            }, function(){
                $(this).find('>span:first-child').addClass('current');
            });

            // add product to the cart
            $('#add-to-cart').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                   url: $('#add-to-cart').attr('href'),
                   data: {id: $("#product_id").html(), 'color': $("#color").val(), 'os': $("#os").val(), 'quantity': $("#quantity").val()},
                   success: function(data) {

                        var result = $.parseJSON(data);

                        $("#count_cart").html(result.length);
                        var cart_total = 0.00;

                        var cart_table = "<table class=\"cart-table\">";

                        for(var i=0; i<result.length; i++){
                            cart_total += (result[i].quantity * result[i].price);
                            cart_table += "<tr id=\"" + result[i].id + "\">" +
                                "<td><img src=\"img/products/" + result[i].picture + "\" alt=\"" + result[i].pname + "\"></td>" +
                                "<td>" +
                                    "<h6>" + result[i].pname + "</h6>" +
                                    "<p>" + result[i].product_id + " | " + result[i].color + " | " + result[i].os + "</p>" +
                                "</td>" +
                                "<td>" +
                                    "<span class=\"quantity\"><span class=\"light\">" + result[i].quantity + " x</span> $" + result[i].price + "</span>" +
                                    "<!--<a href=\"#\" class=\"parent-color\">Remove</a>-->" +
                                "</td>" +
                            "</tr>";
                        }
                        cart_table += "</table>";
                        $("#cart-div").html(cart_table);
                        $("#cart-total").html(cart_total.toString());

                        alert('Your item has been added to the shopping cart.');

                        //$("html, body").animate({ scrollTop: 0 }, "slow");
                   }
            });
        });

        });

            $(document).on('ready pjax:success', function() {
                
                /* Product Images Carousel */
                $('#product-carousel').flexslider({
                    animation: "slide",
                    controlNav: false,
                    animationLoop: false,
                    directionNav: false,
                    slideshow: false,
                    itemWidth: 80,
                    itemMargin: 0,
                    start: function(slider){
                    
                        setActive($('#product-carousel li:first-child img'));
                        slider.find('.right-arrow').click(function(){
                            slider.flexAnimate(slider.getTarget("next"));
                        });
                        
                        slider.find('.left-arrow').click(function(){
                            slider.flexAnimate(slider.getTarget("prev"));
                        });
                        
                        slider.find('img').click(function(){
                            var large = $(this).attr('data-large');
                            setActive($(this));
                            $('#product-slider img').fadeOut(300, changeImg(large, $('#product-slider img')));
                            $('#product-slider a.fullscreen-button').attr('href', large);
                        });
                        
                        function changeImg(large, element){
                            var element = element;
                            var large = large;
                            setTimeout(function(){ startF()},300);
                            function startF(){
                                element.attr('src', large)
                                element.attr('data-large', large)
                                element.fadeIn(300);
                            }
                            
                        }
                        
                        function setActive(el){
                            var element = el;
                            $('#product-carousel img').removeClass('active-item');
                            element.addClass('active-item');
                        }
                        
                    }
                    
                });
                    
                    
                
                /* FullScreen Button */
                $('a.fullscreen-button').click(function(e){
                    e.preventDefault();
                    //$(this).attr("rel","product-images");
                    //$(this).attr('data-ajax', false);
                    var target = $(this).attr('href');

                    $.fancybox.open(target);
                });
                
                
                /* Cloud Zoom */
                $(".cloud-zoom").imagezoomsl({
                    zoomrange: [3, 3]
                });
                
                
                /* FancyBox */
                $(".fancybox").fancybox();

                /* Numeric Input */
                $('.numeric-input').each(function(){
                    
                    var el = $(this);
                    numericInput(el);
                    
                });
                
                
                /* Numeric Input */
                function numericInput(el){
                    
                    var element = el;
                    var input = $(element).find('input');
                    var max = $(element).find('input').attr("maxvalue");
                    
                    $(element).find('.arrow-up').off().click(function(){
                        var value = parseInt(input.val());
                        if((value+1) <= max)
                            input.val(value+1);
                    });
                    
                    $(element).find('.arrow-down').off().click(function(){
                        var value = parseInt(input.val());
                        if((value-1) > 0)
                            input.val(value-1);
                    });
                    
                    input.keypress(function(e){
                        
                        var value = parseInt(String.fromCharCode(e.which));
                        if(isNaN(value)){
                            e.preventDefault();
                        }
                        
                    });
                    
                }

            });

JS;
                    $this->registerJs($script, View::POS_END);
                    //$this->registerJsFile('/smartphone/web/js/main-script1.js', ['depends' => [\yii\web\JqueryAsset::className()]]);
                ?>
