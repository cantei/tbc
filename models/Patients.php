<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patients".
 *
 * @property integer $ID
 * @property string $DATE_REG
 * @property string $TBNUMBER
 * @property string $HN
 * @property string $FNAME
 * @property string $LNAME
 * @property string $SEX
 * @property integer $AGE
 * @property string $DISTRICT
 * @property string $DISTRICT_ID
 * @property string $AMPHUR_ID
 * @property string $AMPHUR
 * @property string $PROVINCE_ID
 * @property string $PROVINCE
 * @property string $PHONE
 */
class Patients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_REG'], 'safe'],
            [['TBNUMBER'], 'required'],
            [['AGE'], 'integer'],
            [['TBNUMBER'], 'string', 'max' => 6],
            [['HN'], 'string', 'max' => 15],
            [['FNAME'], 'string', 'max' => 25],
            [['LNAME'], 'string', 'max' => 30],
            [['SEX'], 'string', 'max' => 1],
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
            'DATE_REG' => 'Date  Reg',
            'TBNUMBER' => 'Tbnumber',
            'HN' => 'Hn',
            'FNAME' => 'Fname',
            'LNAME' => 'Lname',
            'SEX' => 'Sex',
            'AGE' => 'Age',
            'DISTRICT' => 'District',
            'DISTRICT_ID' => 'District  ID',
            'AMPHUR_ID' => 'Amphur  ID',
            'AMPHUR' => 'Amphur',
            'PROVINCE_ID' => 'Province  ID',
            'PROVINCE' => 'Province',
            'PHONE' => 'Phone',
        ];
    }
    public function update($runValidation = true, $attributeNames = null) {
        $this->scenario = 'update';
        return parent::update($runValidation, $attributeNames);
    }

}
