<?php

namespace app\models;

use Yii;
use \app\models\base\Transactions as BaseTransactions;

/**
 * This is the model class for table "transactions".
 */
class Transactions extends BaseTransactions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['order_number', 'customer_id', 'store_id', 'saleperson_id', 'product_id', 'color', 'os', 'quantity', 'price', 'purchase_date'], 'required'],
            [['order_number', 'customer_id', 'store_id', 'product_id', 'quantity'], 'integer'],
            [['price'], 'number'],
            [['purchase_date'], 'safe'],
            [['saleperson_id', 'os'], 'string', 'max' => 10],
            [['color'], 'string', 'max' => 20]
        ]);
    }
	
}
