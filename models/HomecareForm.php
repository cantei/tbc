<?php 
namespace app\models;

use yii\base\Model;
use yii\web\UploadedFile;

class HomevisitForm extends Model
{
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['PHOTO'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
            [['TB_ID', 'VISITDATE'], 'unique', 'targetAttribute' => ['TB_ID', 'VISITDATE'], 'message' => 'The combination of Tb  ID and Visitdate has already been taken.'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) { 
            foreach ($this->imageFiles as $file) {
                $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        } else {
            return false;
        }
    }
}
?>