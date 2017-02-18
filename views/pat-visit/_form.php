<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


use kartik\date\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Patvisit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patvisit-form">

    <?php $form = ActiveForm::begin(); ?>

   
     <div class="row"> 
        <div class="col-md-4">
            <?= $form->field($model, 'VISIT_DATE')->widget(
                DatePicker::className(), [
                    'language' => 'th',
                    'options' => ['placeholder' => 'Select issue date ...'],
                    'pluginOptions' => [
                        'format' => 'yyyy-mm-dd',
                        'todayHighlight' => true,
                        'autoclose'=>true,
                        
                    ]
                ]);
            ?> 
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
              <?= $form->field($model, 'FOOD')->textInput(['maxlength' => true]) ?>
        </div>    
        <div class="col-md-4">
              <?= $form->field($model, 'DAILYDOSE')->textInput(['maxlength' => true]) ?>
        </div> 
        <div class="col-md-4">
            <?= $form->field($model, 'ADR')->textInput() ?>
        </div>         
      

      

        
   </div>
   

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
