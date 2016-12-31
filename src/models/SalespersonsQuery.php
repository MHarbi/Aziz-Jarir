<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Salespersons]].
 *
 * @see Salespersons
 */
class SalespersonsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Salespersons[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Salespersons|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}