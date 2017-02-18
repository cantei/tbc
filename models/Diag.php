<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "diag".
 *
 * @property string $PT_ID
 * @property string $SITES
 * @property string $GROUPS
 * @property string $AFB0
 * @property string $CXR
 * @property string $TB_ID
 */
class Diag extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'diag';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SITES', 'GROUPS','TB_ID'], 'required'],
            [['SITES', 'GROUPS', 'AFB0', 'CXR'], 'string', 'max' => 25],
            [['TB_ID'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PT_ID' => 'Pt  ID',
            'SITES' => 'Sites',
            'GROUPS' => 'Groups',
            'AFB0' => 'Afb0',
            'CXR' => 'Cxr',
            'TB_ID' => 'Tb  ID',
        ];
    }
}
