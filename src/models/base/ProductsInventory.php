<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "products_inventory".
 *
 * @property integer $product_id
 * @property string $os
 * @property string $color
 * @property integer $inventory_amount
 * @property double $price
 *
 * @property \app\models\Products $product
 */
class ProductsInventory extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'os', 'color', 'inventory_amount', 'price'], 'required'],
            [['product_id', 'inventory_amount'], 'integer'],
            [['price'], 'number'],
            [['os'], 'string', 'max' => 10],
            [['color'], 'string', 'max' => 20]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_inventory';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'os' => 'Os',
            'color' => 'Color',
            'inventory_amount' => 'Inventory Amount',
            'price' => 'Price',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasOne(\app\models\Products::className(), ['product_id' => 'product_id']);
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
     * @return \app\models\ProductsInventoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ProductsInventoryQuery(get_called_class());
    }
}
