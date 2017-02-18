<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Outcomes */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="outcomes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TBNUMBER')->textInput(['readonly' => !$model->isNewRecord]) ?>
    
    <?= $form->field($patient, 'FNAME')->textInput(['readonly' => !$model->isNewRecord]) ?>
    
    <?= $form->field($patient, 'LNAME')->textInput(['readonly' => !$model->isNewRecord]) ?>

    <?= $form->field($model, 'OUTCOME_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'OUTCOME_DATE')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
