<?php
// _list_item.php
use yii\helpers\Html;
use yii\helpers\Url;
?>

<!-- Product Item -->
<div class="col-lg-4 col-md-4 col-sm-4 product" data-key="<?= $model->product_id; ?>">
    
    <div class="product-image">
        <img width="270" height="270" src="img/products/<?= (file_exists('img/products/'.$model->picture))? $model->picture : 'sample1.jpg' ?>" alt="<?= $model->pname; ?>">
        <!--<a href="<?= Url::to(['full-products/view', 'id' => $model->product_id]) ?>" class="product-hover"><i class="icons icon-eye-1"></i> Quick View</a>-->
    </div>
    
    <div class="product-info">
        <h5><a href="<?= Url::to(['full-products/view', 'id' => $model->product_id]) ?>"><?= Html::encode($model->pname); ?></a></h5>
        <span class="price">$<?= Html::encode($model->price); ?></span>
        <!--<div class="rating readonly-rating" data-score="4"></div>-->
    </div>
    
    <!--<div class="product-actions">
        <span class="add-to-cart">
            <span class="action-wrapper">
                <i class="icons icon-basket-2"></i>
                <span class="action-name">Add to cart</span>
            </span >
        </span>
        <span class="add-to-favorites">
            <span class="action-wrapper">
                <i class="icons icon-heart-empty"></i>
                <span class="action-name">Add to wishlist</span>
            </span>
        </span>
        <span class="add-to-compare">
            <span class="action-wrapper">
                <i class="icons icon-docs"></i>
                <span class="action-name">Add to Compare</span>
            </span>
        </span>
    </div>-->
    
</div>
<!-- Product Item -->