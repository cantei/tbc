<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\widgets\DatePicker;

use yii\helpers\Url;
use kartik\widgets\DepDrop;
use app\models\Province;
use app\models\Amphur;
use app\models\District;
use app\models\Villa;




/* @var $this yii\web\View */
/* @var $model app\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}

    legend.scheduler-border {
        width:inherit; /* Or auto */
        padding:0 10px; /* To give a bit of padding on the left and right */
        border-bottom:none;
    }
</style>
<div class="patient-form">

    <?php $form = ActiveForm::begin(); ?>

      <fieldset class="scheduler-border">
        <legend class="scheduler-border">ข้อมูลทั่วไป</legend>

        <div class="row">   
            <div class="col-sm-3 col-md-3">
                <?php // echo '<label class="control-label">วันที่ลงทะเบียน</label>'; ?>
               <?php
//    $model->DATE_REG = ($model->isNewRecord)
//        ? null
//        : date(Yii::$app->params['Y-m-d'], $model->DATE_REG);
    ?>
    <?= DatePicker::widget([
        'model' => $model,
        'form' => $form,
        'attribute' => 'DATE_REG',
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true,
            'clearButton' => false,
        ]
    ]);?>
            </div>
            <div class="col-sm-3 col-md-3">
               <?= $form->field($model, 'TBNUMBER')->textInput(['readonly' => !$model->isNewRecord]) ?>              
                 
            </div>
            <div class="col-sm-2 col-md-2">
                 <?= $form->field($model, 'HN')->textInput(['maxlength' => 20]) ?>
            </div>
            <div class="col-sm-2 col-md-2">
                <?= $form->field($model, 'CID')
                        ->widget(\yii\widgets\MaskedInput::className(),
                            [
                                'mask' => '9-9999-99999-99-9',
                            ])
                        
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-md-3">
                 <?= $form->field($model, 'FNAME')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3 col-md-3">
                <?= $form->field($model, 'LNAME')->textInput(['maxlength' => true]) ?>
            </div>

            <div class="col-sm-2 col-md-2">
                 <?= $form->field($model, 'AGE')->textInput(['maxlength' => 3]) ?>
            </div>
            <div class="col-sm-2 col-md-2">
                <?=
                $form->field($model, 'SEX')->dropdownList(
                        ArrayHelper::map(\app\models\Gender::find()->all(), 'ID', 'GENDERNAME'), [
                        'prompt' => 'เพศ...'
                ]);
                ?>
            </div>
            <div class="col-sm-2 col-md-2">
                   <?= $form->field($model, 'BW')->textInput(['maxlength' => true]) ?>
            </div>
        
        </div>
        </fieldset>
     <fieldset class="scheduler-border">
        <legend class="scheduler-border">ข้อมูลที่อยู่</legend>

        <div class="row">
        <div class="col-sm-2 col-md-2">
            <?= $form->field($model, 'AMPHUR')->dropdownList(
                    ArrayHelper::map(Amphur::find()->where(['PROVINCE_ID' => 54])->all(),
                    'AMPHUR_ID',
                    'AMPHUR_NAME'),
                    [
                        'id'=>'ddl-amphur',
                        'prompt'=>'เลือกอำเภอ...'
                ]); 
            ?>

        </div>
        <div class="col-sm-2 col-md-2">
            <?= $form->field($model, 'DISTRICT')->widget(DepDrop::classname(), [
                'options'=>['id'=>'ddl-district'],
                'data' =>[], //<---------
                'pluginOptions'=>[
                    'depends'=>['ddl-amphur'],
                    'placeholder'=>'เลือกตำบล...',
                    'url'=>Url::to(['/patient/get-district'])
                ]
                ]); 
            ?>
        </div>
        <div class="col-sm-2 col-md-2">
             <?= $form->field($model, 'VILLAGE_ID')->widget(DepDrop::classname(), [
                    'options'=>['id'=>'ddl-village'],
                    'data' =>[], //<---------
                    'pluginOptions'=>[
                    'depends'=>['ddl-amphur','ddl-district'],
                    'placeholder'=>'เลือกหมู่...',
                    'url'=>Url::to(['/patient/get-village'])
                ]
                ]); 
            ?>
        </div>
        <div class="col-sm-2 col-md-2">
              <?= $form->field($model, 'HNO')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2 col-md-2">
                <?= $form->field($model, 'PHONE')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-sm-2 col-md-2">
                <?= $form->field($model, 'MEMO')->textInput(['maxlength' => true]) ?>
        </div>
        </div>
    </fieldset>
    
    
    
    
    <fieldset class="scheduler-border">
        <legend class="scheduler-border">ข้อมูลเกี่ยวกับวัณโรค</legend>
        <div class="row">
            <div class="col-sm-3 col-md-3">
                <?=
                $form->field($tuberculosis, 'SITES')->dropdownList(
                        ArrayHelper::map(\app\models\Organs::find()->all(), 'ID', 'ORGANNAME'), [
                        'prompt' => 'จำแนกผู้ป่วย...'
                ]);
                ?>

            </div>
       
            <div class="col-sm-3 col-md-3">
                <?=
                $form->field($tuberculosis, 'GROUPS')->dropdownList(
                        ArrayHelper::map(\app\models\Grouppt::find()->all(), 'ID', 'GROUPNAME'), [
                       'prompt' => 'ประเภทผู้ป่วย...'
                ]);
                ?>
            </div>
            
            <div class="col-sm-3 col-md-3">
                <?php 
//                    $tuberculosis->CXR = $tuberculosis->isNewRecord ? '9' : $tuberculosis->CXR;
                    echo $form->field($tuberculosis, 'CXR')->dropdownList(
                        ArrayHelper::map(\app\models\Cxr::find()->all(), 'ID', 'CXR'), [
                       'prompt' => 'ผลเอ็กเรย์...'
                ]);
                ?>
            </div>
            <div class="col-sm-3 col-md-3">
                <?= $form->field($tuberculosis, 'AFB0')->textInput(['maxlength' => true]) ?>
            </div>
            
        </div>
        
        
         <div class="row">
            <div class="col-sm-3 col-md-3">
                <?= $form->field($tuberculosis, 'MDTCAT')->textInput(['maxlength' => true]) ?>
            </div>
       
            <div class="col-sm-3 col-md-3">
                <?php echo '<label class="control-label">วันที่เริ่มกินยา</label>'; ?>
                <?php echo DatePicker::widget([
                    'model' => $tuberculosis,
                    'attribute' => 'MDTDATE',
                     'pluginOptions' => [
                                'format' => 'dd-M-yyyy',
                                'startDate' => date('Y-m-d'),
                                'todayHighlight' => true,
                                'autoclose'=>TRUE
                        ]                      
                    ]);
                ?>


            </div>
            
            <div class="col-sm-3 col-md-3">
                
            </div>
            <div class="col-sm-3 col-md-3">
             
            </div>
            
        </div>
        
        
        
        
        
    </fieldset>

    
 
     

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'ขึ้นทะเบียน' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
