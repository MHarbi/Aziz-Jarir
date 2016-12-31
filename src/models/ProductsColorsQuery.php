<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ProductsColors]].
 *
 * @see ProductsColors
 */
class ProductsColorsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ProductsColors[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProductsColors|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}