<?php

namespace app\models;

use Yii;
use \app\models\base\ManageRegions as BaseManageRegions;

/**
 * This is the model class for table "manage_regions".
 */
class ManageRegions extends BaseManageRegions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['ssn', 'region_id', 'since'], 'required'],
            [['region_id'], 'integer'],
            [['since'], 'safe'],
            [['ssn'], 'string', 'max' => 10]
        ]);
    }
	
}
