<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patient".
 *
 * @property integer $ID
 * @property string $DATE_REG
 * @property string $TBNUMBER
 * @property string $HN
 * @property string $FNAME
 * @property string $LNAME
 * @property string $CID
 * @property string $SEX
 * @property string $AGE
 * @property string $BW
 * @property string $HNO
 * @property string $ROAD
 * @property string $VILLAGE_ID
 * @property string $MOO
 * @property string $DISTRICT
 * @property string $AMPHUR
 * @property string $PROVINCE
 * @property string $PCU
 * @property string $PHONE
 */
class Patient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TBNUMBER'], 'required'],
            [['TBNUMBER'], 'unique', 'targetAttribute' => ['TBNUMBER'], 'message' => 'TBNUMBER must be unique.'],
            ['TBNUMBER', 'integer','message' => 'Please input a number'],
            ['TBNUMBER', 'string', 'length'=>6,'message' => 'Please choose a 6 digit'],
            [['ID'], 'integer'],
//            [['DATE_REG'], 'safe'],
            [['DATE_REG'], 'required'],
            [['HN'], 'string', 'max' => 15],
            [['FNAME'], 'string', 'max' => 25],
            [['LNAME'], 'string', 'max' => 30],
            [['CID'], 'string', 'max' => 17],
            [['SEX'], 'string', 'max' => 1],
            [['AGE', 'BW'], 'string', 'max' => 3],
            [['HNO', 'ROAD', 'DISTRICT', 'PCU'], 'string', 'max' => 50],
            [['VILLAGE_ID'], 'string', 'max' => 10],
            [['MOO'], 'string', 'max' => 255],
            [['AMPHUR', 'PROVINCE'], 'string', 'max' => 100],
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
            'DATE_REG' => 'วันที่ขึ้นทะเบียน',
            'TBNUMBER' => 'เลขทะเบียนวัณโรค',
            'HN' => 'HN',
            'FNAME' => 'ชื่อ',
            'LNAME' => 'สกุล',
            'CID' => 'เลข ปชช.',
            'SEX' => 'เพศ',
            'AGE' => 'อายุ',
            'BW' => 'น้ำหนัก',
            'HNO' => 'บ้านเลขที่',
            'ROAD' => 'ถนน',
            'VILLAGE_ID' => 'หมู่บ้าน',
            'MOO' => 'Moo',
            'DISTRICT' => 'ตำบล',
            'AMPHUR' => 'อำเภอ',
            'PROVINCE' => 'จังหวัด',
            'PCU' => 'หน่วยบริการ',
            'PHONE' => 'โทรศัพท์',
        ];
    }
    
    /*  ******************************  my  edit   ************************************************** */
    
    public function is6NumbersOnly($attribute)
    {
        if (!preg_match('/^[0-9]{6}$/', $this->$attribute)) {
            $this->addError($attribute, 'must contain exactly 6 digits.');
        }
    }
    public function getTuberculosis()
    {
        return $this->hasOne(Tuberculosis::className(), ['TB_ID' => 'TBNUMBER']);
    }
    
    public function getVilla()
    {
        return $this->hasOne(Villa::className(), ['VILLAGE_ID' => 'VILLAGE_ID']);
    }
    
}
