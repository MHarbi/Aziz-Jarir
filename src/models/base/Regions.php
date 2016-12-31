<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "regions".
 *
 * @property integer $region_id
 * @property string $name
 *
 * @property \app\models\ManageRegions[] $manageRegions
 * @property \app\models\Stores[] $stores
 */
class Regions extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 30]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'regions';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'region_id' => 'Region ID',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getManageRegions()
    {
        return $this->hasMany(\app\models\ManageRegions::className(), ['region_id' => 'region_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStores()
    {
        return $this->hasMany(\app\models\Stores::className(), ['region_id' => 'region_id']);
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
     * @return \app\models\RegionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\RegionsQuery(get_called_class());
    }
}
