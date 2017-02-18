<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gender".
 *
 * @property string $ID
 * @property string $GENDERNAME
 */
class Gender extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gender';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'required'],
            [['ID'], 'string', 'max' => 1],
            [['GENDERNAME'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'GENDERNAME' => 'Gendername',
        ];
    }
}
