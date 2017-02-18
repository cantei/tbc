<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Patvisit]].
 *
 * @see Patvisit
 */
class PatvisitQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Patvisit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Patvisit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
