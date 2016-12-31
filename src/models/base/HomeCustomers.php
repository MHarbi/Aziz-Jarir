<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "home_customers".
 *
 * @property integer $customer_id
 * @property double $income
 * @property string $dob
 * @property string $gender
 * @property string $marriage_status
 *
 * @property \app\models\Customers $customer
 */
class HomeCustomers extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'income', 'dob', 'gender', 'marriage_status'], 'required'],
            [['customer_id'], 'integer'],
            [['income'], 'number'],
            [['dob'], 'safe'],
            [['gender'], 'string', 'max' => 6],
            [['marriage_status'], 'string', 'max' => 10]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'home_customers';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'income' => 'Income',
            'dob' => 'Dob',
            'gender' => 'Gender',
            'marriage_status' => 'Marriage Status',
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
     * @return \app\models\HomeCustomersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\HomeCustomersQuery(get_called_class());
    }
}
