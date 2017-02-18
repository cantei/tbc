<?php
namespace app\models;
use yii\base\Model;
use Yii;
use yii\helpers\ArrayHelper;
/**
 * Signup form
 */
class VisitForm extends Model
{
    public $tb_id;
    public $photo;
    public $visitdate;
    public $food;
    public $dailydose;
    public $adr;
    
    public function rules()
    {
        return [
//            [['TB_ID', 'VISITDATE'], 'required'],
//            [['VISITDATE'], 'safe'],
//            [['ADR'], 'integer'],
//            [['HOMECARE'], 'string'],
//            [['TB_ID'], 'string', 'max' => 6],
//            [['REF'], 'string', 'max' => 50],
//            [['FOOD', 'DAILYDOSE'], 'string', 'max' => 25],
//            [['DOTWATCHER'], 'string', 'max' => 2],
//            [['PHOTO'], 'string', 'max' => 255],
//            [['PHOTO'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
//            [['tb_id', 'visitdate'], 'unique', 'targetAttribute' => ['tb_id', 'visitdate'], 'message' => 'The combination of Tb  ID and Visitdate has already been taken.'],      
            
//            [
//                'visitdate', 'unique', 
//                'targetAttribute' => ['tb_id', 'visitdate'],
//                'message' => 'visitdate must be unique.'
//            ],
                [['tb_id','visitdate'], 'unique'
                    ,'targetClass' => '\app\models\Homevisit'
                    , 'message' => 'This email has already been taken.'
//                    ,'filter' => ['=','tb_id' ,0]
                ],
        ];
    }
     public function attributeLabels()
    {
        return [
//            'ID' => 'ID',
//            'TB_ID' => 'Tb  ID',
//            'REF' => 'Ref',
//            'VISITDATE' => 'Visitdate',
//            'FOOD' => 'Food',
//            'DAILYDOSE' => 'Dailydose',
//            'ADR' => 'Adr',
//            'ADR_MDT1' => 'Adr  Mdt1',
//            'ADR_MDT2' => 'Adr  Mdt2',
//            'ADR_MDT3' => 'Adr  Mdt3',
//            'ADR_MDT4' => 'Adr  Mdt4',
//            'ADR_MDT5' => 'Adr  Mdt5',
//            'ADR_MDT6' => 'Adr  Mdt6',
//            'ADR_MDT7' => 'Adr  Mdt7',
//            'DOTWATCHER' => 'Dotwatcher',
//            'PHOTO' => 'Photo',
//            'HOMECARE' => 'Homecare',
        ];
    }
    
    
    public static function itemsAlias($key){

      $items = [
//        'sex'=>[
//          self::SEX_MEN => 'ชาย',
//          self::SEX_WOMEN => 'หญิง'
//        ],
        'food'=>[
          1 => 'เบื่ออาหาร',
          2 => 'ไม่เบื่ออาหาร',
          3 => 'เจริญอาการ'
        ],
        'dialydose'=>[
          1 => 'ไม่ขาดยา',
          2 => 'ขาดบางวัน',
        
        ],
        'adr'=>[         
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
      return self::itemsAlias('food');
    }

    public function getItemDailydose()
    {
      return self::itemsAlias('dialydose');
    }
    
    public function getFoodName(){
        return ArrayHelper::getValue($this->getItemFood(),$this->food_status);
    }

    public function getDailydoseName(){
        return ArrayHelper::getValue($this->getItemDailydose(),$this->level);
    }
    
    
    public function adrToArray()
    {
      return $this->adr = explode(',', $this->adr);
    }
    
    public function getAdrName(){
        //$skills = $this->getItemSkill();
        $skills = ArrayHelper::map(Adr::find()->all(),'id','name');
        $skillSelected = explode(',', $this->adr);
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