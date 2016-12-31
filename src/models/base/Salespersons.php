<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "salespersons".
 *
 * @property string $ssn
 * @property string $name
 * @property string $dob
 * @property string $phone
 * @property double $salary
 * @property string $job_title
 * @property string $password
 * @property string $email
 * @property string $address1
 * @property string $address2
 * @property string $zip
 * @property string $country
 * @property integer $store_id
 *
 * @property \app\models\ManageRegions[] $manageRegions
 * @property \app\models\ManageStores[] $manageStores
 * @property \app\models\CitiesStates $country0
 * @property \app\models\Stores $store
 * @property \app\models\Transactions[] $transactions
 */
class Salespersons extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
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
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salespersons';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ssn' => 'Ssn',
            'name' => 'Name',
            'dob' => 'Dob',
            'phone' => 'Phone',
            'salary' => 'Salary',
            'job_title' => 'Job Title',
            'password' => 'Password',
            'email' => 'Email',
            'address1' => 'Address1',
            'address2' => 'Address2',
            'zip' => 'Zip',
            'country' => 'Country',
            'store_id' => 'Store ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManageRegions()
    {
        return $this->hasMany(\app\models\ManageRegions::className(), ['ssn' => 'ssn']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManageStores()
    {
        return $this->hasMany(\app\models\ManageStores::className(), ['ssn' => 'ssn']);
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
    public function getStores()
    {
        return $this->hasOne(\app\models\Stores::className(), ['store_id' => 'store_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(\app\models\Transactions::className(), ['saleperson_id' => 'ssn']);
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
     * @return \app\models\SalespersonsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\SalespersonsQuery(get_called_class());
    }
}
