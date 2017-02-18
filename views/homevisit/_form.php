<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Homevisit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="homevisit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'TB_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'REF')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'VISITDATE')->textInput() ?>

    <?= $form->field($model, 'FOOD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DAILYDOSE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DOTWATCHER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PHOTO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HOMECARE')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
