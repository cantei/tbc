<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\HomecareForm;
use yii\web\UploadedFile;

class HomecareController extends Controller
{
    // ไม่สวย
    public function actionIndex()
    {
        $model = new HomecareForm();

        if (Yii::$app->request->isPost) {
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            \yii\helpers\VarDumper::dump($model);
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('index', ['model' => $model]);
    }
}
?>