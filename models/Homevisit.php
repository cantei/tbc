<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "homevisit".
 *
 * @property string $ID
 * @property string $TB_ID
 * @property string $REF
 * @property string $VISITDATE
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
            [['TB_ID', 'VISITDATE'], 'required'],
            [['VISITDATE'], 'safe'],
            [['TB_ID'], 'string', 'max' => 6],
            [['REF'], 'string', 'max' => 255],
            [['REF'], 'unique'],
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
        ];
    }

    /**
     * @inheritdoc
     * @return HomevisitQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HomevisitQuery(get_called_class());
    }
}
