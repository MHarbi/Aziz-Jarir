<?php

namespace app\models;

use Yii;
use \app\models\base\ProductsOs as BaseProductsOs;

/**
 * This is the model class for table "products_os".
 */
class ProductsOs extends BaseProductsOs
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['product_id', 'os'], 'required'],
            [['product_id'], 'integer'],
            [['os'], 'string', 'max' => 10]
        ]);
    }
	
}
