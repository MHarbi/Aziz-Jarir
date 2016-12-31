<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "business_customers".
 *
 * @property integer $customer_id
 * @property string $business_category
 * @property double $gross_annual_income
 *
 * @property \app\models\Customers $customer
 */
class BusinessCustomers extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'business_category', 'gross_annual_income'], 'required'],
            [['customer_id'], 'integer'],
            [['gross_annual_income'], 'number'],
            [['business_category'], 'string', 'max' => 30]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'business_customers';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'business_category' => 'Business Category',
            'gross_annual_income' => 'Gross Annual Income',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasOne(\app\models\Customers::className(), ['customer_id' => 'customer_id']);
    }

/**
     * @inheritdoc
     * @return type mixed
     * 
    public function behaviors()
    {
        return [
            [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }*/

    /**
     * @inheritdoc
     * @return \app\models\BusinessCustomersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\BusinessCustomersQuery(get_called_class());
    }
}
