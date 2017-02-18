<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "areahospname".
 *
 * @property string $AREACODE
 * @property string $VILLAGE
 * @property string $VILLANAME
 * @property string $HOSPCODE
 * @property string $HOSPNAME
 */
class Areahospname extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'areahospname';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AREACODE'], 'required'],
            [['AREACODE'], 'string', 'max' => 8],
            [['VILLAGE'], 'string', 'max' => 2],
            [['VILLANAME', 'HOSPNAME'], 'string', 'max' => 255],
            [['HOSPCODE'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'AREACODE' => 'Areacode',
            'VILLAGE' => 'Village',
            'VILLANAME' => 'Villaname',
            'HOSPCODE' => 'Hospcode',
            'HOSPNAME' => 'Hospname',
        ];
    }
}
