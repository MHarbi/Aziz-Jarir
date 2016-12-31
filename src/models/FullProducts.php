<?php

namespace app\models;

use Yii;
use \app\models\base\FullProducts as BaseFullProducts;

/**
 * This is the model class for table "full_products".
 */
class FullProducts extends BaseFullProducts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['product_id', 'memory', 'inventory_amount'], 'integer'],
            [['pname', 'brand', 'picture', 'product_kind', 'screen', 'memory', 'processor', 'color', 'os', 'inventory_amount', 'price'], 'required'],
            [['price'], 'number'],
            [['pname', 'product_kind', 'processor'], 'string', 'max' => 30],
            [['brand', 'picture', 'color'], 'string', 'max' => 20],
            [['screen'], 'string', 'max' => 4],
            [['os'], 'string', 'max' => 10]
        ]);
    }
	
}
