<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbcat".
 *
 * @property integer $ID
 * @property string $TBNUMBER
 * @property string $DRUGCAT
 * @property string $DATESTART
 */
class Tbcat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbcat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TBNUMBER'], 'required'],
            [['DATESTART'], 'safe'],
            [['TBNUMBER'], 'string', 'max' => 5],
            [['DRUGCAT'], 'string', 'max' => 25],
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
            'DRUGCAT' => 'Drugcat',
            'DATESTART' => 'Datestart',
        ];
    }
}
