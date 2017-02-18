<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\widgets\DepDrop;
use app\models\Province;
use app\models\Amphur;
use app\models\District;
use app\models\Villa;

use kartik\widgets\DatePicker;


/* @var $this yii\web\View */
/* @var $model app\models\Patient */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patient-form">

    <?php $form = ActiveForm::begin(); ?>

            <div class="row">   
            <div class="col-sm-3 col-md-3">
                <?php echo '<label class="control-label">วันที่ลงทะเบียน</label>'; ?>
                <?=  DatePicker::widget([
                        'model' => $model,
                        'attribute' => 'DATE_REG',
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
               <?= $form->field($model, 'TBNUMBER')->widget(\yii\widgets\MaskedInput::className(), [
    'mask' => '99-999',
])->textInput(['readonly' => !$model->isNewRecord]) ?>
                            
                            
                 
            </div>
            <div class="col-sm-3 col-md-3">
                 <?= $form->field($model, 'HN')->textInput(['maxlength' => 20]) ?>
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
                <?= $form->field($model, 'CID')
                        ->widget(\yii\widgets\MaskedInput::className(),
                            [
                                'mask' => '9-9999-99999-99-9',
                            ])
                        
                ?>
            </div>
            <div class="col-sm-1 col-md-1">
                 <?= $form->field($model, 'AGE')->textInput(['maxlength' => 3]) ?>
            </div>
            <div class="col-sm-1 col-md-1">
                 <?= $form->field($model, 'SEX')->textInput(['maxlength' => 1]) ?>
            </div>
        
        </div>
   
    <div class="row">
        <div class="col-sm-3 col-md-3">
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
        <div class="col-sm-3 col-md-3">
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
        <div class="col-sm-3 col-md-3">
             <?= $form->field($model, 'MOO')->widget(DepDrop::classname(), [
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
    </div>
        <div class="col-sm-3 col-md-3">
              <?= $form->field($model, 'HNO')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    
   
   
    <?= $form->field($model, 'PHONE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
