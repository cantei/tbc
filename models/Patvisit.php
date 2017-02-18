<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "patvisit".
 *
 * @property integer $VISIT_ID
 * @property string $TBNUMBER
 * @property string $VISIT_DATE
 * @property string $REF
 * @property string $FOOD
 * @property string $DAILYDOSE
 * @property integer $ADR
 * @property string $DOTWATCHER
 * @property string $PHOTO
 * @property string $HOMECARE
 *
 * @property Pat $tBNUMBER
 */
class Patvisit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'patvisit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TBNUMBER'], 'required'],
            [['VISIT_DATE'], 'safe'],
            [['ADR'], 'integer'],
            [['HOMECARE'], 'string'],
            [['TBNUMBER'], 'string', 'max' => 6],
            [['REF'], 'string', 'max' => 255],
            [['FOOD', 'DAILYDOSE'], 'string', 'max' => 25],
            [['DOTWATCHER'], 'string', 'max' => 2],
            [['PHOTO'], 'string', 'max' => 255],            
            [['TBNUMBER']
                , 'exist'
                ,'skipOnError' => true
                ,'targetClass' => Pat::className()
                ,'targetAttribute' => ['TBNUMBER' => 'TBNUMBER']
            ],
             [['TBNUMBER','VISIT_DATE']
                , 'unique'
//                ,'skipOnError' => true
                ,'targetClass' => Patvisit::className()
                ,'targetAttribute' => ['TBNUMBER' => 'TBNUMBER','VISIT_DATE'=>'VISIT_DATE']
                ,'message' => 'มีการบันทึกการเยี่ยมสำหรับวันนี้แล้วจ้า' 
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'VISIT_ID' => 'เลขบริการ',
            'TBNUMBER' => 'เลขทะเบียนวัณโรค',
            'VISIT_DATE' => 'วันเยี่ยมบ้าน',
            'REF' => 'เลขอ้างอิง',
            'FOOD' => 'การทานอาหาร',
            'DAILYDOSE' => 'การใช้ยา',
            'ADR' => 'อาการไม่พึงประสงค์จากยา',
            'DOTWATCHER' => 'ผู้กำกับการกินยา',
            'PHOTO' => 'ภาพถ่าย',
            'HOMECARE' => 'ข้อมูลการดูแล',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getTBNUMBER()
    {
        return $this->hasOne(Pat::className(), ['TBNUMBER' => 'TBNUMBER']);
    }

    /**
     * @inheritdoc
     * @return PatvisitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PatvisitQuery(get_called_class());
    }
    
    
    
    
    
    
    
}
