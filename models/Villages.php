<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "villages".
 *
 * @property string $VILLAGE_ID
 * @property string $VILLAGE_CODE
 * @property string $VILLAGE_NAME
 * @property string $HOSPCODE
 * @property string $HOSPNAME
 * @property integer $SUBDIST_ID
 * @property string $SUBDIST_CODE
 */
class Villages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'villages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SUBDIST_ID'], 'integer'],
            [['VILLAGE_ID', 'SUBDIST_CODE'], 'string', 'max' => 8],
            [['VILLAGE_CODE'], 'string', 'max' => 2],
            [['VILLAGE_NAME', 'HOSPNAME'], 'string', 'max' => 255],
            [['HOSPCODE'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'VILLAGE_ID' => 'Village  ID',
            'VILLAGE_CODE' => 'Village  Code',
            'VILLAGE_NAME' => 'Village  Name',
            'HOSPCODE' => 'Hospcode',
            'HOSPNAME' => 'Hospname',
            'SUBDIST_ID' => 'Subdist  ID',
            'SUBDIST_CODE' => 'Subdist  Code',
        ];
    }
}
