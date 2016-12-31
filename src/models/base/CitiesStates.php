<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "cities_states".
 *
 * @property string $country
 * @property string $zip
 * @property string $city
 * @property string $state
 *
 * @property \app\models\Customers[] $customers
 * @property \app\models\Salespersons[] $salespersons
 * @property \app\models\Stores[] $stores
 */
class CitiesStates extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['country', 'zip', 'city', 'state'], 'required'],
            [['country', 'city', 'state'], 'string', 'max' => 20],
            [['zip'], 'string', 'max' => 7]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cities_states';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'country' => 'Country',
            'zip' => 'Zip',
            'city' => 'City',
            'state' => 'State',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomers()
    {
        return $this->hasMany(\app\models\Customers::className(), ['country' => 'country', 'zip' => 'zip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalesPersons()
    {
        return $this->hasMany(\app\models\Salespersons::className(), ['country' => 'country', 'zip' => 'zip']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStores()
    {
        return $this->hasMany(\app\models\Stores::className(), ['country' => 'country', 'zip' => 'zip']);
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
     * @return \app\models\CitiesStatesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\CitiesStatesQuery(get_called_class());
    }
}
