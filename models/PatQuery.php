<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Pat]].
 *
 * @see Pat
 */
class PatQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Pat[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Pat|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
