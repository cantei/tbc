<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Homevisit]].
 *
 * @see Homevisit
 */
class HomevisitQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Homevisit[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Homevisit|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
