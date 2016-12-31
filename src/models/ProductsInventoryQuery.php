<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProductsInventory]].
 *
 * @see ProductsInventory
 */
class ProductsInventoryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ProductsInventory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProductsInventory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}