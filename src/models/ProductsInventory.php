<?php

namespace app\models;

use Yii;
use \app\models\base\ProductsInventory as BaseProductsInventory;

/**
 * This is the model class for table "products_inventory".
 */
class ProductsInventory extends BaseProductsInventory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['product_id', 'os', 'color', 'inventory_amount', 'price'], 'required'],
            [['product_id', 'inventory_amount'], 'integer'],
            [['price'], 'number'],
            [['os'], 'string', 'max' => 10],
            [['color'], 'string', 'max' => 20]
        ]);
    }
	
}
