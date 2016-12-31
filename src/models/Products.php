<?php

namespace app\models;

use Yii;
use \app\models\base\Products as BaseProducts;

/**
 * This is the model class for table "products".
 */
class Products extends BaseProducts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['pname', 'brand', 'product_kind', 'picture', 'screen', 'memory', 'processor'], 'required'],
            [['memory'], 'integer'],
            [['pname', 'product_kind', 'processor'], 'string', 'max' => 30],
            [['brand'], 'string', 'max' => 20],
            [['screen'], 'string', 'max' => 4]
        ]);
    }

    public function attributeLabels()
    {
        return array_replace_recursive(parent::attributeLabels(),[
            'product_id' => 'Product ID',
            'pname' => 'Product Name',
            'brand' => 'Brand',
            'picture' => 'Picture',
            'product_kind' => 'Product Kind',
            'screen' => 'Screen',
            'memory' => 'Memory',
            'processor' => 'Processor',
        ]);
    }
	
}
