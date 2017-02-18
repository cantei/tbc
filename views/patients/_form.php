<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Province;
use kartik\depdrop\DepDrop;

/* @var $this yii\web\View */
/* @var $model app\models\Patients */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patients-form">

    <?php $form = ActiveForm::begin(); ?>

        <div class="row">   
            <div class="col-sm-4 col-md-4">
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
            <div class="col-sm-4 col-md-4">
                <?= $form->field($model, 'TBNUMBER')
                        ->widget(\yii\widgets\MaskedInput::className(),
                            [
                                'mask' => '99-999',
                            ])
                        ->textInput(['readonly' => !$model->isNewRecord]) 
                ?>
            </div>
            <div class="col-sm-4 col-md-4">
                 <?= $form->field($model, 'HN')->textInput(['maxlength' => 20]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3 col-md-3">
             <?= $form->field($model, 'FNAME')->textInput(['maxlength' => 20]) ?>
            </div>
            <div class="col-sm-3 col-md-3">
             <?= $form->field($model, 'LNAME')->textInput(['maxlength' => 20]) ?>
            </div>
            <div class="col-sm-3 col-md-3">
             <?= $form->field($model, 'SEX')->textInput(['maxlength' => 20]) ?>
            </div>
            <div class="col-sm-3 col-md-3">
             <?= $form->field($model, 'AGE')->textInput(['maxlength' => 20]) ?>
            </div>
        </div>
    
        
        <div class="row">
            <div class="col-sm-4 col-md-4">
               <?= $form->field($model, 'PROVINCE')->dropdownList(
                    ArrayHelper::map(Province::find()->all(),
                    'PROVINCE_ID',
                    'PROVINCE_NAME'),
                    [
                        'id'=>'ddl-province',
                        'prompt'=>'เลือกจังหวัด'
                    ]); ?>
            </div>


        </div>



        <div class="row">
            <div class="col-sm-3 col-md-3">
                <?= $form->field($diag, 'SITES')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3 col-md-3">
                <?= $form->field($diag, 'GROUPS')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3 col-md-3">
                <?= $form->field($diag, 'AFB0')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-sm-3 col-md-3">
                <?= $form->field($diag, 'CXR')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
    
    
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
