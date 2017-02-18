<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catchmentarea".
 *
 * @property string $AREACODE
 * @property string $DISTRICT_CODE
 * @property integer $DISTRICT_ID
 * @property string $VILLAGE
 * @property string $VILLANAME
 * @property string $HOSPCODE
 * @property string $HOSPNAME
 * @property integer $VILLAGE_ID
 * @property string $VILLAGE_NAME
 */
class Catchmentarea extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catchmentarea';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AREACODE'], 'required'],
            [['DISTRICT_ID', 'VILLAGE_ID'], 'integer'],
            [['AREACODE', 'DISTRICT_CODE'], 'string', 'max' => 8],
            [['VILLAGE'], 'string', 'max' => 2],
            [['VILLANAME', 'HOSPNAME', 'VILLAGE_NAME'], 'string', 'max' => 255],
            [['HOSPCODE'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'AREACODE' => 'Areacode',
            'DISTRICT_CODE' => 'District  Code',
            'DISTRICT_ID' => 'District  ID',
            'VILLAGE' => 'Village',
            'VILLANAME' => 'Villaname',
            'HOSPCODE' => 'Hospcode',
            'HOSPNAME' => 'Hospname',
            'VILLAGE_ID' => 'Village  ID',
            'VILLAGE_NAME' => 'Village  Name',
        ];
    }
}
