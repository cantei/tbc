<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tuberculosis".
 *
 * @property string $ID
 * @property string $SITES
 * @property string $GROUPS
 * @property string $AFB0
 * @property string $CXR
 * @property string $MDTCAT
 * @property string $MDTDATE
 * @property string $TB_ID
 */
class Tuberculosis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tuberculosis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SITES', 'GROUPS', 'TB_ID'], 'required'],
            [['MDTDATE'], 'safe'],
            [['SITES', 'GROUPS', 'AFB0', 'CXR', 'MDTCAT'], 'string', 'max' => 25],
            [['TB_ID'], 'string', 'max' => 6],
            [['HIV'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'SITES' => 'จำแนกผู้ป่วย',
            'GROUPS' => 'ประเภทผู้ป่วย',
            'AFB0' => 'ผลเสมหะครั้งแรก',
            'CXR' => 'ผลเอ็กเรย์',
            'MDTCAT' => 'สูตรยา',
            'MDTDATE' => 'วันที่เริ่มยา',
            'TB_ID' => 'เลขทะเบียนวัณโรค',
            'HIV' => 'HIV SCREENING',
        ];
    }
}
