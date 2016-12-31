<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ManageRegions]].
 *
 * @see ManageRegions
 */
class ManageRegionsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ManageRegions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ManageRegions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}