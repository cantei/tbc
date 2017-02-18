<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ddl".
 *
 * @property integer $TBNUMBER
 * @property string $VILLAGE_ID
 * @property string $MOO
 * @property string $DISTRICT
 * @property string $AMPHUR
 * @property string $PROVINCE
 * @property string $PCU
 * @property string $PHONE
 */
class Ddl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'ddl';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VILLAGE_ID'], 'string', 'max' => 10],
            [['MOO'], 'string', 'max' => 255],
            [['DISTRICT', 'PCU'], 'string', 'max' => 50],
            [['AMPHUR', 'PROVINCE'], 'string', 'max' => 100],
            [['PHONE'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TBNUMBER' => 'Tbnumber',
            'VILLAGE_ID' => 'Village  ID',
            'MOO' => 'Moo',
            'DISTRICT' => 'District',
            'AMPHUR' => 'Amphur',
            'PROVINCE' => 'Province',
            'PCU' => 'Pcu',
            'PHONE' => 'Phone',
        ];
    }
}
