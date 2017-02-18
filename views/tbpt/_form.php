<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tbpt */
/* @var $form yii\widgets\ActiveForm */
?>
<style>
    
   legend.scheduler-border {
    width:inherit; /* Or auto */
    padding:0 10px; /* To give a bit of padding on the left and right */
    border-bottom:none;
}
fieldset.scheduler-border {
    border: 1px groove #ddd !important;
    padding: 0 1.4em 1.4em 1.4em !important;
    margin: 0 0 1.5em 0 !important;
    -webkit-box-shadow:  0px 0px 0px 0px #000;
            box-shadow:  0px 0px 0px 0px #000;
}
</style>

<div class="tbpt-form">
<fieldset class="scheduler-border">
        <legend class="scheduler-border">-ข้อมูลทั่วไปและที่อยู่</legend>
    
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TBNUMBER')->textInput(['readonly' => !$model->isNewRecord]) ?>

    <?= $form->field($model, 'FNAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LNAME')->textInput(['maxlength' => true]) ?>
     </fieldset>
<fieldset class="scheduler-border">
        <legend class="scheduler-border">การวินิยฉัยและรักษา</legend>        
        
        
    <?= $form->field($cat, 'DRUGCAT')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($cat, 'DATESTART')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <!--... your inputs ...-->
    </fieldset>
</div>
