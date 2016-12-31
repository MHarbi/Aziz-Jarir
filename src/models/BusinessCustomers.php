<?php

namespace app\models;

use Yii;
use \app\models\base\BusinessCustomers as BaseBusinessCustomers;

/**
 * This is the model class for table "business_customers".
 */
class BusinessCustomers extends BaseBusinessCustomers
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['customer_id', 'business_category', 'gross_annual_income'], 'required'],
            [['customer_id'], 'integer'],
            [['gross_annual_income'], 'number'],
            [['business_category'], 'string', 'max' => 30]
        ]);
    }
	
}
