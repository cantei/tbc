<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\models\Adr;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "homevisit".
 *
 * @property string $ID
 * @property string $TB_ID
 * @property string $REF
 * @property string $VISITDATE
 * @property string $FOOD
 * @property string $DAILYDOSE
 * @property string $ADR
 * @property string $ADR_MDT1
 * @property string $ADR_MDT2
 * @property string $ADR_MDT3
 * @property string $ADR_MDT4
 * @property string $ADR_MDT5
 * @property string $ADR_MDT6
 * @property string $ADR_MDT7
 * @property string $DOTWATCHER
 * @property string $PHOTO
 * @property string $HOMECARE
 */
class Homevisit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'homevisit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TB_ID'], 'required'],
            [['HOMECARE'], 'string'],
            [['TB_ID'], 'string', 'max' => 6],
            [['REF'], 'string', 'max' => 50],
            [['FOOD', 'DAILYDOSE','ADR_MDT1', 'ADR_MDT2', 'ADR_MDT3', 'ADR_MDT4', 'ADR_MDT5', 'ADR_MDT6', 'ADR_MDT7'], 'string', 'max' => 25],
            [['DOTWATCHER'], 'string', 'max' => 2],
            [['PHOTO'], 'string', 'max' => 255],
            [['REF'], 'unique'],
            [['ADR'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'TB_ID' => 'Tb  ID',
            'REF' => 'Ref',
            'VISITDATE' => 'Visitdate',
            'FOOD' => 'Food',
            'DAILYDOSE' => 'Dailydose',
            'ADR' => 'Adr',
            'ADR_MDT1' => 'Adr  Mdt1',
            'ADR_MDT2' => 'Adr  Mdt2',
            'ADR_MDT3' => 'Adr  Mdt3',
            'ADR_MDT4' => 'Adr  Mdt4',
            'ADR_MDT5' => 'Adr  Mdt5',
            'ADR_MDT6' => 'Adr  Mdt6',
            'ADR_MDT7' => 'Adr  Mdt7',
            'DOTWATCHER' => 'Dotwatcher',
            'PHOTO' => 'Photo',
            'HOMECARE' => 'Homecare',
        ];
    }
    
    
    public static function itemsAlias($key){

      $items = [
//        'sex'=>[
//          self::SEX_MEN => 'ชาย',
//          self::SEX_WOMEN => 'หญิง'
//        ],
        'FOOD'=>[
          1 => 'เบื่ออาหาร',
          2 => 'ไม่เบื่ออาหาร',
          3 => 'เจริญอาการ'
        ],
        'DAILYDOSE'=>[
          1 => 'ไม่ขาดยา',
          2 => 'ขาดบางวัน',
        
        ],
        'ADR'=>[         
          'ตัวเหลือง' => 'ตัวเหลือง',
          'ตาเหลือง' => 'ตาเหลือง',         
            'หูอื้อ' => 'หูอื้อ',
            'มีผื่น'=>'มีผื่น',
      ]
    ];
      return ArrayHelper::getValue($items,$key,[]);
      //return array_key_exists($key, $items) ? $items[$key] : [];
    }

    public function getItemFood()
    {
      return self::itemsAlias('FOOD');
    }

    public function getItemDailydose()
    {
      return self::itemsAlias('DAILYDOSE');
    }
    
    public function getFoodName(){
        return ArrayHelper::getValue($this->getItemFood(),$this->food_status);
    }

    public function getDailydoseName(){
        return ArrayHelper::getValue($this->getItemDailydose(),$this->level);
    }
    
    
    public function adrToArray()
    {
      return $this->ADR = explode(',', $this->ADR);
    }
    
    public function getAdrName(){
        //$skills = $this->getItemSkill();
        $skills = ArrayHelper::map(Adr::find()->all(),'id','name');
        $skillSelected = explode(',', $this->ADR);
        $skillSelectedName = [];
        foreach ($skills as $key => $skillName) {
          foreach ($skillSelected as $skillKey) {

            if($key === (int)$skillKey){
              $skillSelectedName[] = $skillName;
            }
          }
        }

        return implode(', ', $skillSelectedName);
    }
    
    
}
