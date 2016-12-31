<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "stores".
 *
 * @property integer $store_id
 * @property integer $region_id
 * @property string $zip
 * @property string $country
 * @property string $address1
 * @property string $address2
 *
 * @property \app\models\ManageStores[] $manageStores
 * @property \app\models\Salespersons[] $salespersons
 * @property \app\models\CitiesStates $country0
 * @property \app\models\Regions $region
 * @property \app\models\Transactions[] $transactions
 */
class Stores extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['region_id', 'zip', 'country', 'address1'], 'required'],
            [['region_id'], 'integer'],
            [['zip'], 'string', 'max' => 7],
            [['country'], 'string', 'max' => 20],
            [['address1', 'address2'], 'string', 'max' => 50]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'stores';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'store_id' => 'Store ID',
            'region_id' => 'Region ID',
            'zip' => 'Zip',
            'country' => 'Country',
            'address1' => 'Address1',
            'address2' => 'Address2',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManageStores()
    {
        return $this->hasMany(\app\models\ManageStores::className(), ['store_id' => 'store_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSalespersons()
    {
        return $this->hasMany(\app\models\Salespersons::className(), ['store_id' => 'store_id']);
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
    public function getRegions()
    {
        return $this->hasOne(\app\models\Regions::className(), ['region_id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactions()
    {
        return $this->hasMany(\app\models\Transactions::className(), ['store_id' => 'store_id']);
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
     * @return \app\models\StoresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\StoresQuery(get_called_class());
    }
}
