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
 * @property integer $AGE
 * @property integer $BW
 * @property string $HNO
 * @property string $VILLAGE_ID
 * @property string $DISTRICT
 * @property string $AMPHUR
 * @property string $PROVINCE
 * @property string $PHONE
 * @property string $MEMO
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
            [['DATE_REG'], 'safe'],
            [['DATE_REG'], 'required'],
            [['TBNUMBER'], 'required'],
            [['TBNUMBER'], 'unique', 'targetAttribute' => ['TBNUMBER'], 'message' => 'TBNUMBER must be unique.'],
            ['TBNUMBER', 'integer','message' => 'Please input a number'],
            ['TBNUMBER', 'string', 'length'=>6,'message' => 'Please choose a 6 digit'],
//            [['TBNUMBER', 'HN', 'FNAME', 'LNAME', 'VILLAGE_ID', 'DISTRICT', 'AMPHUR', 'PROVINCE'], 'required'],
            [['AGE', 'BW'], 'integer'],
            [['TBNUMBER', 'DISTRICT'], 'string', 'max' => 6],
            [['HN'], 'string', 'max' => 15],
            [['PRENAME'], 'string', 'max' => 25],
            [['FNAME'], 'string', 'max' => 25],
            [['LNAME'], 'string', 'max' => 30],
            [['CID'], 'string', 'max' => 17],
            [['SEX'], 'string', 'max' => 1],
            [['HNO', 'PHONE'], 'string', 'max' => 20],
            [['VILLAGE_ID'], 'string', 'max' => 8],
            [['AMPHUR'], 'string', 'max' => 4],
            [['PROVINCE'], 'string', 'max' => 2],
            [['MEMO'], 'string', 'max' => 255],
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
            'PRENAME'=>'คำนำหน้า',
            'FNAME' => 'ชื่อ',
            'LNAME' => 'สกุล',
            'CID' => 'เลข ปชช.',
            'SEX' => 'เพศ',
            'AGE' => 'อายุ',
            'BW' => 'น้ำหนัก',
            'HNO' => 'บ้านเลขที่',
            'ROAD' => 'ถนน',
            'VILLAGE_ID' => 'หมู่บ้าน',
            'DISTRICT' => 'ตำบล',
            'AMPHUR' => 'อำเภอ',
            'PROVINCE' => 'จังหวัด',
            'PCU' => 'หน่วยบริการ',
            'PHONE' => 'โทรศัพท์',
            'MEMO' => 'หมายเหตุ',
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
    public function getHomevisit()
    {
        return $this->hasOne(Homevisit::className(), ['TB_ID' => 'TBNUMBER']);
    }
    public function getVisitCount()
    {
        return Homevisit::find()->where(['TB_ID' => $this->TBNUMBER,])->andWhere('VISITDATE <> :regist',[':regist' =>  $this->DATE_REG])->count();
    }
//    public function getOutcomes()
//    {
//        return $this->hasOne(Outcomes::className(), ['TBNUMBER' => 'TBNUMBER']);
//    }
    
    
}
