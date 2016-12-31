<?php

namespace app\models;

use Yii;
use \app\models\base\Customers as BaseCustomers;

/**
 * This is the model class for table "customers".
 */
class Customers extends BaseCustomers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['name', 'email', 'phone', 'kind', 'zip', 'country', 'address1', 'since', 'password'], 'required'],
            [['since'], 'safe'],
            [['name', 'kind'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 100],
            [['phone'], 'match', 'pattern'=>'/^[1-9]\d\d\d\d\d\d\d\d\d$/'],
            [['zip'], 'string', 'max' => 7],
            [['country'], 'string', 'max' => 20],
            [['address1', 'address2'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 15],
            ['email', 'email'],
        ]);
    }
	
}
