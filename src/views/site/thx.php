<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Shopping Cart';
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
            	
                <table class="order-table">
                                
                    <tr>
                        <th>#</th>
                        <th>Product ID</th>
                        <th>Product Name</th>
                        <th>Operating System</th>
                        <th>Color</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    <?php $cart_total = 0.0;
                            $index = 0; 
                            $cart_length = sizeof($cartarr);

                    foreach ($cartarr as $item) { ?>
                    <tr>
                        <td><?= ++$index ?></td>
                        <td class="order-number"><p><a href="<?= Url::to(['/full-products/view', 'id' => $item['product_id']]); ?>"><?= $item['product_id'] ?></a></p></td>
                        <td><p><a href="<?= Url::to(['/full-products/view', 'id' => $item['product_id']]); ?>"><?= $item['pname'] ?></a></p></td>
                        <td><p><?= $item['os'] ?></p></td>
                        <td><p><?= $item['color'] ?></p></td>
                        <td><span class="price" style="color: #34495e;">$<?= $item['price'] ?></span></td>
                        <td><p><?= $item['quantity'] ?></p></td>
                        <td><p><?= ($item['quantity'] * $item['price']) ?></p></td>
                        <td><a href="<?= Url::to(['/site/cart-update', 'id' => $item['id']]) ?>" style="color: #e74c3c;">Remove</a></td>
                    </tr>
                    <?php $cart_total += ($item['quantity'] * $item['price']) ?>
                    <?php } ?>

                    <tr>
                        <td class="align-right" colspan="7"><span class="price big" style="color: #34495e;">Total</span></td>
                        <td><span class="price big">$<?= $cart_total ?></span></td>
                        <td></td>
                    </tr>                            
                    
                </table>

                <div class="row box-wrapper no-border">
                    <a class="button pull-right parent-background" style="<?= ($cart_length == '0')? 'pointer-events: none; background-color: #eee; ': 'background:#f5791f'; ?>" href="<?= Url::to(["site/checkout"]) ?>">Checkout</a>
                </div>
                
            </div>
            
    	</div>
          
    </div>
        
    
</section>
<!-- /Main Content -->