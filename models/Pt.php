<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pt".
 *
 * @property integer $ID
 * @property string $TBNUMBER
 * @property string $HN
 * @property string $FNAME
 * @property string $LNAME
 * @property string $DISTRICT
 * @property string $DISTRICT_ID
 * @property string $AMPHUR_ID
 * @property string $AMPHUR
 * @property string $PROVINCE_ID
 * @property string $PROVINCE
 * @property string $PHONE
 */
class Pt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TBNUMBER'], 'required'],
            [['TBNUMBER'], 'string', 'max' => 6],
            [['HN'], 'string', 'max' => 15],
            [['FNAME'], 'string', 'max' => 25],
            [['LNAME'], 'string', 'max' => 30],
            [['DISTRICT'], 'string', 'max' => 10],
            [['DISTRICT_ID', 'AMPHUR_ID'], 'string', 'max' => 50],
            [['AMPHUR', 'PROVINCE'], 'string', 'max' => 100],
            [['PROVINCE_ID'], 'string', 'max' => 8],
            [['PHONE'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'TBNUMBER' => 'Tbnumber',
            'HN' => 'Hn',
            'FNAME' => 'Fname',
            'LNAME' => 'Lname',
            'DISTRICT' => 'District',
            'DISTRICT_ID' => 'District  ID',
            'AMPHUR_ID' => 'Amphur  ID',
            'AMPHUR' => 'Amphur',
            'PROVINCE_ID' => 'Province  ID',
            'PROVINCE' => 'Province',
            'PHONE' => 'Phone',
        ];
    }
}
