<?php

namespace app\models;

use Yii;
use \app\models\base\Regions as BaseRegions;

/**
 * This is the model class for table "regions".
 */
class Regions extends BaseRegions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 30]
        ]);
    }
	
}
