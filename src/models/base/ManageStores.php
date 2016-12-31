<?php

namespace app\models\base;

use Yii;
//use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "manage_stores".
 *
 * @property string $ssn
 * @property integer $store_id
 * @property string $since
 *
 * @property \app\models\Stores $store
 * @property \app\models\Salespersons $ssn0
 */
class ManageStores extends \yii\db\ActiveRecord
{

    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ssn', 'store_id', 'since'], 'required'],
            [['store_id'], 'integer'],
            [['since'], 'safe'],
            [['ssn'], 'string', 'max' => 10]
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'manage_stores';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ssn' => 'Ssn',
            'store_id' => 'Store ID',
            'since' => 'Since',
        ];
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
     * @return \app\models\ManageStoresQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ManageStoresQuery(get_called_class());
    }
}
