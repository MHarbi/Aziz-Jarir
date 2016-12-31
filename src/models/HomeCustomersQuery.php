<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[HomeCustomers]].
 *
 * @see HomeCustomers
 */
class HomeCustomersQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return HomeCustomers[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HomeCustomers|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}