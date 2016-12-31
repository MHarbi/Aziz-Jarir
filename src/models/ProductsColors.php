<?php

namespace app\models;

use Yii;
use \app\models\base\ProductsColors as BaseProductsColors;

/**
 * This is the model class for table "products_colors".
 */
class ProductsColors extends BaseProductsColors
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['product_id', 'color'], 'required'],
            [['product_id'], 'integer'],
            [['color'], 'string', 'max' => 20]
        ]);
    }
	
}
