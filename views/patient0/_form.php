<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\Url;
use yii\helpers\ArrayHelper;


use kartik\widgets\DepDrop;

use app\models\Province;
use app\models\Amphur;
use app\models\District;
use app\models\Drugcat;
//use kartik\widgets\DateTimePicker;
use kartik\widgets\DatePicker;

use yii\bootstrap\Tabs;
/* @var $this yii\web\View */
/* @var $model app\models\Ptprofile */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="body-content">
        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
       <?= Tabs::widget([
        'items' => [
            [
                'label' => 'ข้อมูลทั่วไปและที่อยู่',
                'content' => $this->render('my_form1', ['model' => $model, 'form' => $form]),
                'active' => true
            ],
            [
                'label' => 'การวินิจฉัยและรักษา',
                'content' => $this->render('my_form2', ['model' => $model, 'form' => $form]),
            ],
            [
                'label' => 'ผลการดูแลรักษา',
                'content' => $this->render('my_form3', [
                    'model' => $model
                    , 'form' => $form
//                    ,'drugcat'=>$drugcat
//                   ,'illness'=>$illness
                    ]),
            ],
        ]]);
        ?>
    <?php ActiveForm::end(); ?>
</div>