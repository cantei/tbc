<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cxr".
 *
 * @property string $ID
 * @property string $CXR
 */
class Cxr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cxr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'required'],
            [['ID'], 'string', 'max' => 1],
            [['CXR'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'CXR' => 'Cxr',
        ];
    }
}
