<?php
use yii\helpers\Html;
use kartik\tabs\TabsX;
use yii\helpers\Url;
$items = [
    [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Product'),
        'content' => $this->render('_detail', [
            'model' => $model,
        ]),
    ],
        [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Product Colors'),
        'content' => $this->render('_dataProductsColors', [
            'model' => $model,
            'row' => $model->productsColors,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Product OS'),
        'content' => $this->render('_dataProductsOs', [
            'model' => $model,
            'row' => $model->productsOs,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Product Inventory'),
        'content' => $this->render('_dataProductsInventory', [
            'model' => $model,
            'row' => $model->productsInventories,
        ]),
    ],
            [
        'label' => '<i class="glyphicon glyphicon-book"></i> '. Html::encode('Transactions'),
        'content' => $this->render('_dataTransactions', [
            'model' => $model,
            'row' => $model->transactions,
        ]),
    ],
    ];
echo TabsX::widget([
    'items' => $items,
    'position' => TabsX::POS_ABOVE,
    'encodeLabels' => false,
    'class' => 'tes',
    'pluginOptions' => [
        'bordered' => true,
        'sideways' => true,
        'enableCache' => false
        //        'height' => TabsX::SIZE_TINY
    ],
    'pluginEvents' => [
        "tabsX.click" => "function(e) {setTimeout(function(e){
                if ($('.nav-tabs > .active').next('li').length == 0) {
                    $('#prev').show();
                    $('#next').hide();
                } else if($('.nav-tabs > .active').prev('li').length == 0){
                    $('#next').show();
                    $('#prev').hide();
                }else{
                    $('#next').show();
                    $('#prev').show();
                };
                console.log(JSON.stringify($('.active', '.nav-tabs').html()));
            },10)}",
    ],
]);
?>
