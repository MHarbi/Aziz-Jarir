<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BusinessCustomers]].
 *
 * @see BusinessCustomers
 */
class BusinessCustomersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return BusinessCustomers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BusinessCustomers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}