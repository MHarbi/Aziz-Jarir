<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "transactions".
 *
 * @property integer $order_number
 * @property integer $customer_id
 * @property integer $store_id
 * @property string $saleperson_id
 * @property integer $product_id
 * @property string $color
 * @property string $os
 * @property integer $quantity
 * @property double $price
 * @property string $purchase_date
 *
 * @property \app\models\Salespersons $saleperson
 * @property \app\models\Stores $store
 * @property \app\models\ProductsColors $product
 * @property \app\models\Customers $customer
 */
class Transactions extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_number', 'customer_id', 'store_id', 'saleperson_id', 'product_id', 'color', 'os', 'quantity', 'price', 'purchase_date'], 'required'],
            [['order_number', 'customer_id', 'store_id', 'product_id', 'quantity'], 'integer'],
            [['price'], 'number'],
            [['purchase_date'], 'safe'],
            [['saleperson_id', 'os'], 'string', 'max' => 10],
            [['color'], 'string', 'max' => 20]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transactions';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'order_number' => 'Order Number',
            'customer_id' => 'Customer ID',
            'store_id' => 'Store ID',
            'saleperson_id' => 'Saleperson ID',
            'product_id' => 'Product ID',
            'color' => 'Color',
            'os' => 'Os',
            'quantity' => 'Quantity',
            'price' => 'Price',
            'purchase_date' => 'Purchase Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalespersons()
    {
        return $this->hasOne(\app\models\Salespersons::className(), ['ssn' => 'saleperson_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStores()
    {
        return $this->hasOne(\app\models\Stores::className(), ['store_id' => 'store_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(\app\models\ProductsColors::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsColors()
    {
        return $this->hasOne(\app\models\ProductsColors::className(), ['product_id' => 'product_id', 'color' => 'color']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasOne(\app\models\Customers::className(), ['customer_id' => 'customer_id']);
    }

/**
     * @inheritdoc
     * @return type mixed
     * 
    public function behaviors()
    {
        return [
            [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }*/

    /**
     * @inheritdoc
     * @return \app\models\TransactionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\TransactionsQuery(get_called_class());
    }
}
