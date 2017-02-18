<?php

namespace app\models;

use Yii;
//use app\models\Tbcat;

/**
 * This is the model class for table "tbpt".
 *
 * @property integer $ID
 * @property string $TBNUMBER
 * @property string $FNAME
 * @property string $LNAME
 */
class Tbpt extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbpt';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TBNUMBER', 'FNAME', 'LNAME'], 'required'],
            [['TBNUMBER'], 'string', 'max' => 5],
            ['TBNUMBER', 'unique'],
            [['FNAME', 'LNAME'], 'string', 'max' => 100],
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
            'FNAME' => 'Fname',
            'LNAME' => 'Lname',
        ];
    }
    
     /**
     * @return array relational rules.
     */
//    public function relations()
//    {
//        // NOTE: you may need to adjust the relation name and the related
//        // class name for the relations automatically generated below.
//        return array(
//            'children' => array(self::HAS_MANY, 'Child', 'father_id'),
//        );
//    }
//    public function getMarkets() {
//        return $this->hasMany(Tbcat::className(), ['id' => 'market_id'])
//                        ->viaTable('tbl_user_market', ['user_id' => 'id']);
//    }
    
    public function getTbcat()
    {
        return $this->hasMany(Tbpt::className(), ['TBNUMBER' => 'TBNUMBER']);
    }

}
