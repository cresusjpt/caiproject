<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[BienImmobilier]].
 *
 * @see BienImmobilier
 */
class BienImmobilierQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return BienImmobilier[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return BienImmobilier|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
