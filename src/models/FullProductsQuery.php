<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[FullProducts]].
 *
 * @see FullProducts
 */
class FullProductsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return FullProducts[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FullProducts|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}