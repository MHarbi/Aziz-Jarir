<?php

namespace app\models\base;

use Yii;
use yii\web\UploadedFile;

//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "products".
 *
 * @property integer $product_id
 * @property string $pname
 * @property string $brand
 * @property string $picture
 * @property string $product_kind
 * @property string $screen
 * @property integer $memory
 * @property string $processor
 *
 * @property \app\models\ProductsColors[] $productsColors
 * @property \app\models\ProductsInventory[] $productsInventories
 * @property \app\models\ProductsOs[] $productsOs
 * @property \app\models\Transactions[] $transactions
 */
class Products extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pname', 'brand', 'product_kind', 'picture', 'screen', 'memory', 'processor'], 'required'],
            [['memory'], 'integer'],
            [['pname', 'product_kind', 'processor'], 'string', 'max' => 30],
            [['brand'], 'string', 'max' => 20],
            [['picture'], 'safe'],
            [['picture'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, jpeg, gif, png'],
            [['screen'], 'string', 'max' => 4]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
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
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsColors()
    {
        return $this->hasMany(\app\models\ProductsColors::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsInventories()
    {
        return $this->hasMany(\app\models\ProductsInventory::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductsOs()
    {
        return $this->hasMany(\app\models\ProductsOs::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(\app\models\Transactions::className(), ['product_id' => 'product_id']);
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
     * @return \app\models\ProductsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ProductsQuery(get_called_class());
    }
}
