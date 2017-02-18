<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "illness".
 *
 * @property string $TBNUMBER
 * @property string $SITES
 * @property string $GROUPS
 * @property string $AFB0
 * @property string $CXR
 * @property string $COMORBID
 */
class Illness extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'illness';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TBNUMBER'], 'required'],
            [['TBNUMBER'], 'string', 'max' => 10],
            [['SITES', 'GROUPS'], 'string', 'max' => 1],
            [['AFB0'], 'string', 'max' => 50],
            [['CXR', 'COMORBID'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TBNUMBER' => 'Tbnumber',
            'SITES' => 'Sites',
            'GROUPS' => 'Groups',
            'AFB0' => 'Afb0',
            'CXR' => 'Cxr',
            'COMORBID' => 'Comorbid',
        ];
    }
}
