<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm;
// use kartik\widgets\DatePicker;
use kartik\date\DatePicker;
use kartik\widgets\FileInput;

use yii\helpers\ArrayHelper;

use app\models\Skill;
use app\models\Adr;

/* @var $this yii\web\View */
/* @var $model app\models\Homevisit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="homevisit-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4"> 
            <?= $form->field($model, 'yourtext')->textInput(['readonly'=>true]) ?>
         
        </div>
        <div class="col-md-4">
          
        </div>    
        <div class="col-md-4">
          
        </div>
    </div>
    
    <div class="row"> 
        <div class="col-md-4">
            <?= $form->field($model, 'VISITDATE')->widget(
                DatePicker::className(), [
                    'language' => 'th',
                     'options' => ['placeholder' => 'Select issue date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true
                    ]
                ]);
            ?> 
        </div>
    </div>

    <div class="row">
        <div class="col-md-4"> 
            <?= $form->field($model, 'FOOD')->radioList($model->getItemFood()) ?>
        </div>
        <div class="col-md-1"></div>    
        <div class="col-md-4">
            <?= $form->field($model, 'DAILYDOSE')->radioList($model->getItemDailydose()) ?>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
     
        <?= $form->field($model, 'ADR')->inline()->checkBoxList(ArrayHelper::map(Adr::find()->all(),'id','name')) ?>
      </div>
    </div>
     <hr>
   <div class="form-group field-upload_files">
    <label class="control-label" for="upload_files[]"> ภาพถ่าย </label>
    
    <div>
    <?php 
    /*
        echo FileInput::widget([
                   'name' => 'upload_ajax[]',
                   'options' => ['multiple' => true,'accept' => 'image/*'], //'accept' => 'image/*' หากต้องเฉพาะ image
                    'pluginOptions' => [
                        'overwriteInitial'=>false,
                        'initialPreviewShowDelete'=>true,
//                       'initialPreview'=> $initialPreview,
//                        'initialPreviewConfig'=> $initialPreviewConfig,
//                        'uploadUrl' => Url::to(['/photo-library/upload-ajax']),
//                        'uploadExtraData' => [
//                            'ref' => $model->ref,
//                        ],
                        'maxFileCount' => 100
                    ]
                ]);
     * 
     */
    ?>
    </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($patient->isNewRecord ? 'Create' : 'Update', ['class' => $patient->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
