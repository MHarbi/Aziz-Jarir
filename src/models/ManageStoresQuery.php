<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ManageStores]].
 *
 * @see ManageStores
 */
class ManageStoresQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ManageStores[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ManageStores|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}