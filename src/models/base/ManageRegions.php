<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "manage_regions".
 *
 * @property string $ssn
 * @property integer $region_id
 * @property string $since
 *
 * @property \app\models\Regions $region
 * @property \app\models\Salespersons $ssn0
 */
class ManageRegions extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ssn', 'region_id', 'since'], 'required'],
            [['region_id'], 'integer'],
            [['since'], 'safe'],
            [['ssn'], 'string', 'max' => 10]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manage_regions';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ssn' => 'Ssn',
            'region_id' => 'Region ID',
            'since' => 'Since',
        ];
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
    public function getSalespersons()
    {
        return $this->hasOne(\app\models\Salespersons::className(), ['ssn' => 'ssn']);
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
     * @return \app\models\ManageRegionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ManageRegionsQuery(get_called_class());
    }
}
