<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "full_products".
 *
 * @property integer $product_id
 * @property string $pname
 * @property string $brand
 * @property string $picture
 * @property string $product_kind
 * @property string $screen
 * @property integer $memory
 * @property string $processor
 * @property string $color
 * @property string $os
 * @property integer $inventory_amount
 * @property double $price
 */
class FullProducts extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'memory', 'inventory_amount'], 'integer'],
            [['pname', 'brand', 'picture', 'product_kind', 'screen', 'memory', 'processor', 'color', 'os', 'inventory_amount', 'price'], 'required'],
            [['price'], 'number'],
            [['pname', 'product_kind', 'processor'], 'string', 'max' => 30],
            [['brand', 'picture', 'color'], 'string', 'max' => 20],
            [['screen'], 'string', 'max' => 4],
            [['os'], 'string', 'max' => 10]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'full_products';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'product_id' => 'Product ID',
            'pname' => 'Pname',
            'brand' => 'Brand',
            'picture' => 'Picture',
            'product_kind' => 'Product Kind',
            'screen' => 'Screen',
            'memory' => 'Memory',
            'processor' => 'Processor',
            'color' => 'Color',
            'os' => 'Os',
            'inventory_amount' => 'Inventory Amount',
            'price' => 'Price',
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\FullProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\FullProductsQuery(get_called_class());
    }

    public static function primaryKey(){
        return ['product_id', 'color', 'os'];
    }
}
