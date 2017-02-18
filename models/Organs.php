<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "organs".
 *
 * @property string $ID
 * @property string $ORGANNAME
 */
class Organs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'organs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'required'],
            [['ID'], 'string', 'max' => 1],
            [['ORGANNAME'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'ORGANNAME' => 'Organname',
        ];
    }
}
