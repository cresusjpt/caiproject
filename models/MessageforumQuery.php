<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Messageforum]].
 *
 * @see Messageforum
 */
class MessageforumQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Messageforum[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Messageforum|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
