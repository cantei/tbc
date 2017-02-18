<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HomevisitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="homevisit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'TB_ID') ?>

    <?= $form->field($model, 'REF') ?>

    <?= $form->field($model, 'VISITDATE') ?>

    <?= $form->field($model, 'FOOD') ?>

    <?php // echo $form->field($model, 'DAILYDOSE') ?>

    <?php // echo $form->field($model, 'ADR') ?>

    <?php // echo $form->field($model, 'ADR_MDT1') ?>

    <?php // echo $form->field($model, 'ADR_MDT2') ?>

    <?php // echo $form->field($model, 'ADR_MDT3') ?>

    <?php // echo $form->field($model, 'ADR_MDT4') ?>

    <?php // echo $form->field($model, 'ADR_MDT5') ?>

    <?php // echo $form->field($model, 'ADR_MDT6') ?>

    <?php // echo $form->field($model, 'ADR_MDT7') ?>

    <?php // echo $form->field($model, 'DOTWATCHER') ?>

    <?php // echo $form->field($model, 'PHOTO') ?>

    <?php // echo $form->field($model, 'HOMECARE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
