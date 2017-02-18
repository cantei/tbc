<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[EasyUpload]].
 *
 * @see EasyUpload
 */
class EasyUploadQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return EasyUpload[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return EasyUpload|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
