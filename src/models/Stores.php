<?php

namespace app\models;

use Yii;
use \app\models\base\Stores as BaseStores;

/**
 * This is the model class for table "stores".
 */
class Stores extends BaseStores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['region_id', 'zip', 'country', 'address1'], 'required'],
            [['region_id'], 'integer'],
            [['zip'], 'string', 'max' => 7],
            [['country'], 'string', 'max' => 20],
            [['address1', 'address2'], 'string', 'max' => 50]
        ]);
    }
	
}
