<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;

use kartik\widgets\DepDrop;

use app\models\Province;
use app\models\Amphur;
use app\models\District;
use app\models\Villa;
/* @var $this yii\web\View */
/* @var $model app\models\Ddl */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ddl-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'VILLAGE_ID')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'PROVINCE')->dropdownList(
            ArrayHelper::map(Province::find()->all(),
            'PROVINCE_ID',
            'PROVINCE_NAME'),
            [
                'id'=>'ddl-province',
                'prompt'=>'เลือกจังหวัด'
        ]); 
    ?>
    
   <?= $form->field($model, 'AMPHUR')->widget(DepDrop::classname(), [
    'options'=>['id'=>'ddl-amphur'],
    'data'=> [], //<---------
    'pluginOptions'=>[
        'depends'=>['ddl-province'],
        'placeholder'=>'เลือกอำเภอ...',
        'url'=>Url::to(['/ddl/get-amphur'])
    ]
]); ?>


    <?= $form->field($model, 'DISTRICT')->widget(DepDrop::classname(), [
        'options'=>['id'=>'ddl-district'],
        'data' =>[], //<---------
        'pluginOptions'=>[
            'depends'=>['ddl-province', 'ddl-amphur'],
            'placeholder'=>'เลือกตำบล...',
            'url'=>Url::to(['/ddl/get-district'])
        ]
        ]); 
    ?>
    <?= $form->field($model, 'MOO')->widget(DepDrop::classname(), [
            'options'=>['id'=>'ddl-village'],
            'data' =>[], //<---------
            'pluginOptions'=>[
            'depends'=>['ddl-province', 'ddl-amphur','ddl-district'],
            'placeholder'=>'เลือกหมู่...',
            'url'=>Url::to(['/ddl/get-village'])
        ]
        ]); 
    ?>
 
    <?= $form->field($model, 'PCU')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PHONE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
