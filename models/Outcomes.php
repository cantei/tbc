<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "outcomes".
 *
 * @property integer $ID
 * @property string $TBNUMBER
 * @property string $OUTCOME_ID
 * @property string $OUTCOME_DATE
 */
class Outcomes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'outcomes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TBNUMBER'], 'required'],
            [['OUTCOME_DATE'], 'safe'],
            [['TBNUMBER'], 'string', 'max' => 6],
            [['OUTCOME_ID'], 'string', 'max' => 100],
            [['FNAME'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'TBNUMBER' => 'เลขทะเบียนวัณโรค',
            'OUTCOME_ID' => 'Outcome  ID',
            'OUTCOME_DATE' => 'Outcome  Date',
        ];
    }
    public function getPatient()
    {
        return $this->hasOne(Patient::className(), ['TBNUMBER' => 'TBNUMBER']);
    }
    public function getOutcometype()
    {
        return $this->hasOne(Outcometype::className(), ['OUTCOME_ID' => 'OUTCOME_ID']);
    }
    public function getTuberculosis()
    {
        return $this->hasOne(Tuberculosis::className(), ['TB_ID'=>'TBNUMBER']);
    }
    
}
