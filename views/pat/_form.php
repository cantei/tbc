<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pat */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pat-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'REG_DATE')->textInput() ?>

    <?= $form->field($model, 'TBNUMBER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HN')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FNAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LNAME')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SEX')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AGE')->textInput() ?>

    <?= $form->field($model, 'BW')->textInput() ?>

    <?= $form->field($model, 'HNO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'VILLAGE_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DISTRICT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AMPHUR')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PROVINCE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PHONE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MEMO')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
