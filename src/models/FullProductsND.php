<?php

namespace app\models;

use Yii;
use \app\models\base\FullProductsND as BaseFullProductsND;

/**
 * This is the model class for table "full_products_n_d".
 */
class FullProductsND extends BaseFullProductsND
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['product_id', 'inventory_amount'], 'integer'],
            [['pname', 'picture', 'product_kind', 'brand'], 'required'],
            [['price'], 'number'],
            [['pname', 'product_kind'], 'string', 'max' => 30],
            [['picture', 'brand'], 'string', 'max' => 20]
        ]);
    }
	
}
