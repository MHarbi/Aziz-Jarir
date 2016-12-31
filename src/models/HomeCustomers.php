<?php

namespace app\models;

use Yii;
use \app\models\base\HomeCustomers as BaseHomeCustomers;

/**
 * This is the model class for table "home_customers".
 */
class HomeCustomers extends BaseHomeCustomers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['customer_id', 'income', 'dob', 'gender', 'marriage_status'], 'required'],
            [['customer_id'], 'integer'],
            [['income'], 'number'],
            [['dob'], 'safe'],
            [['gender'], 'string', 'max' => 6],
            [['marriage_status'], 'string', 'max' => 10]
        ]);
    }
	
}
