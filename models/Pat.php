<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pat".
 *
 * @property string $REG_DATE
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
 *
 * @property Patvisit[] $patvisits
 */
class Pat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['REG_DATE'], 'safe'],
            [['TBNUMBER', 'HN', 'FNAME', 'LNAME', 'VILLAGE_ID', 'DISTRICT', 'AMPHUR', 'PROVINCE'], 'required'],
            [['AGE', 'BW'], 'integer'],
            [['TBNUMBER', 'DISTRICT'], 'string', 'max' => 6],
            [['HN'], 'string', 'max' => 15],
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
            'REG_DATE' => 'Reg  Date',
            'TBNUMBER' => 'Tbnumber',
            'HN' => 'Hn',
            'FNAME' => 'Fname',
            'LNAME' => 'Lname',
            'CID' => 'Cid',
            'SEX' => 'Sex',
            'AGE' => 'Age',
            'BW' => 'Bw',
            'HNO' => 'Hno',
            'VILLAGE_ID' => 'Village  ID',
            'DISTRICT' => 'District',
            'AMPHUR' => 'Amphur',
            'PROVINCE' => 'Province',
            'PHONE' => 'Phone',
            'MEMO' => 'Memo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPatvisits()
    {
        return $this->hasMany(Patvisit::className(), ['TBNUMBER' => 'TBNUMBER']);
    }

    /**
     * @inheritdoc
     * @return PatQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PatQuery(get_called_class());
    }
    /* my edit */
//    public function getPatvisit()
//    {
//         return $this->hasMany(Patvisit::className(), ['TBNUMBER' => 'TBNUMBER'])->
//            orderBy(['TBNUMBER' => SORT_DESC]);
//    }
    public function getVisitCount()
    {
        return Patvisit::find()->where(['TBNUMBER' => $this->TBNUMBER,])
                ->andWhere('VISIT_DATE > :regist',[':regist' =>  $this->REG_DATE])
                ->count();
    }
    
}
