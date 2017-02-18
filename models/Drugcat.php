<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "drugcat".
 *
 * @property string $TBNUMBER
 * @property string $DATE_CAT
 * @property string $DRUGCAT
 * @property string $DRUGNOTE
 */
class Drugcat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'drugcat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TBNUMBER'], 'required'],
            [['TBNUMBER'], 'string', 'max' => 10],
            [['DATE_CAT', 'DRUGCAT'], 'string', 'max' => 14],
            [['DRUGNOTE'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TBNUMBER' => 'Tbnumber',
            'DATE_CAT' => 'Date  Cat',
            'DRUGCAT' => 'Drugcat',
            'DRUGNOTE' => 'Drugnote',
        ];
    }
}
