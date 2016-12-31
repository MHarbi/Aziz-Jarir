<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "full_products_n_d".
 *
 * @property integer $product_id
 * @property string $pname
 * @property string $picture
 * @property string $product_kind
 * @property string $brand
 * @property double $price
 * @property integer $inventory_amount
 */
class FullProductsND extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'inventory_amount'], 'integer'],
            [['pname', 'picture', 'product_kind', 'brand'], 'required'],
            [['price'], 'number'],
            [['pname', 'product_kind'], 'string', 'max' => 30],
            [['picture', 'brand'], 'string', 'max' => 20]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'full_products_n_d';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'pname' => 'Pname',
            'picture' => 'Picture',
            'product_kind' => 'Product Kind',
            'brand' => 'Brand',
            'price' => 'Price',
            'inventory_amount' => 'Inventory Amount',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\FullProductsNDQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\FullProductsNDQuery(get_called_class());
    }
}
