<?php

namespace app\models;

use Yii;
use \app\models\base\CitiesStates as BaseCitiesStates;

/**
 * This is the model class for table "cities_states".
 */
class CitiesStates extends BaseCitiesStates
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['country', 'zip', 'city', 'state'], 'required'],
            [['country', 'city', 'state'], 'string', 'max' => 20],
            [['zip'], 'string', 'max' => 7]
        ]);
    }
	
}
