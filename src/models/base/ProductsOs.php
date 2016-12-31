<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "products_os".
 *
 * @property integer $product_id
 * @property string $os
 *
 * @property \app\models\ProductsInventory[] $productsInventories
 * @property \app\models\Products $product
 * @property \app\models\Transactions[] $transactions
 */
class ProductsOs extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'os'], 'required'],
            [['product_id'], 'integer'],
            [['os'], 'string', 'max' => 10]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_os';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'os' => 'Os',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsInventories()
    {
        return $this->hasMany(\app\models\ProductsInventory::className(), ['product_id' => 'product_id', 'os' => 'os']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(\app\models\Products::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(\app\models\Transactions::className(), ['product_id' => 'product_id', 'os' => 'os']);
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
     * @return \app\models\ProductsOsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ProductsOsQuery(get_called_class());
    }
}
