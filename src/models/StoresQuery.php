<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Stores]].
 *
 * @see Stores
 */
class StoresQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Stores[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Stores|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}