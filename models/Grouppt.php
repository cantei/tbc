<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grouppt".
 *
 * @property string $ID
 * @property string $GROUPNAME
 */
class Grouppt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grouppt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'required'],
            [['ID'], 'string', 'max' => 1],
            [['GROUPNAME'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'GROUPNAME' => 'Groupname',
        ];
    }
}
