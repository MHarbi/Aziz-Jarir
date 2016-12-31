<?php

namespace app\models;

use Yii;
use \app\models\base\Salespersons as BaseSalespersons;

/**
 * This is the model class for table "salespersons".
 */
class Salespersons extends BaseSalespersons
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['ssn', 'name', 'dob', 'phone', 'salary', 'job_title', 'password', 'email', 'address1', 'zip', 'country', 'store_id'], 'required'],
            [['dob'], 'safe'],
            [['salary'], 'number'],
            [['store_id'], 'integer'],
            [['phone'], 'match', 'pattern'=>'/^[1-9]\d\d\d\d\d\d\d\d\d$/'],
            [['ssn'], 'string', 'max' => 10],
            [['name'], 'string', 'max' => 30],
            [['job_title', 'password'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 100],
            [['address1', 'address2'], 'string', 'max' => 50],
            [['zip'], 'string', 'max' => 7],
            [['country'], 'string', 'max' => 20]
        ]);
    }
	
}
