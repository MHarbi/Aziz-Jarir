<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "customers".
 *
 * @property integer $customer_id
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $kind
 * @property string $zip
 * @property string $country
 * @property string $address1
 * @property string $address2
 * @property string $since
 * @property string $password
 *
 * @property \app\models\BusinessCustomers $businessCustomers
 * @property \app\models\CitiesStates $country0
 * @property \app\models\HomeCustomers $homeCustomers
 * @property \app\models\Transactions[] $transactions
 */
class Customers extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'kind', 'zip', 'country', 'address1', 'since', 'password'], 'required'],
            [['since'], 'safe'],
            [['name', 'kind'], 'string', 'max' => 30],
            [['email'], 'string', 'max' => 100],
            [['phone'], 'match', 'pattern'=>'/^[1-9]\d\d\d\d\d\d\d\d\d$/'],
            [['zip'], 'string', 'max' => 7],
            [['country'], 'string', 'max' => 20],
            [['address1', 'address2'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 15]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'customer_id' => 'Customer ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'kind' => 'Kind',
            'zip' => 'Zip',
            'country' => 'Country',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'since' => 'Since',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBusinessCustomers()
    {
        return $this->hasOne(\app\models\BusinessCustomers::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCitiesStates()
    {
        return $this->hasOne(\app\models\CitiesStates::className(), ['country' => 'country', 'zip' => 'zip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHomeCustomers()
    {
        return $this->hasOne(\app\models\HomeCustomers::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(\app\models\Transactions::className(), ['customer_id' => 'customer_id']);
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
     * @return \app\models\CustomersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\CustomersQuery(get_called_class());
    }
}
