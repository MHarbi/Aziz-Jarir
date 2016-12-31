<?php

namespace app\models;

use Yii;
use \app\models\base\ManageStores as BaseManageStores;

/**
 * This is the model class for table "manage_stores".
 */
class ManageStores extends BaseManageStores
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['ssn', 'store_id', 'since'], 'required'],
            [['store_id'], 'integer'],
            [['since'], 'safe'],
            [['ssn'], 'string', 'max' => 10]
        ]);
    }
	
}
