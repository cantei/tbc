<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "treatment".
 *
 * @property string $ID
 * @property string $TBNUMBER
 * @property string $CAT
 * @property string $DATESTART
 */
class Treatment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'treatment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TBNUMBER', 'CAT', 'DATESTART'], 'required'],
            [['TBNUMBER'], 'string', 'max' => 5],
            [['CAT', 'DATESTART'], 'string', 'max' => 25],
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
            'CAT' => 'Cat',
            'DATESTART' => 'Datestart',
        ];
    }
}
