<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "products_colors".
 *
 * @property integer $product_id
 * @property string $color
 *
 * @property \app\models\Products $product
 * @property \app\models\ProductsInventory[] $productsInventories
 * @property \app\models\Transactions[] $transactions
 */
class ProductsColors extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'color'], 'required'],
            [['product_id'], 'integer'],
            [['color'], 'string', 'max' => 20]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products_colors';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'color' => 'Color',
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
     * @return \yii\db\ActiveQuery
     */
    public function getProductsInventories()
    {
        return $this->hasMany(\app\models\ProductsInventory::className(), ['product_id' => 'product_id', 'color' => 'color']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(\app\models\Transactions::className(), ['product_id' => 'product_id', 'color' => 'color']);
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
     * @return \app\models\ProductsColorsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ProductsColorsQuery(get_called_class());
    }
}
