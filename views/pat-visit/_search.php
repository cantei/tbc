<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PatvisitSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="patvisit-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'VISIT_ID') ?>

    <?= $form->field($model, 'TBNUMBER') ?>

    <?= $form->field($model, 'VISIT_DATE') ?>

    <?= $form->field($model, 'REF') ?>

    <?= $form->field($model, 'VISITDATE') ?>

    <?php // echo $form->field($model, 'FOOD') ?>

    <?php // echo $form->field($model, 'DAILYDOSE') ?>

    <?php // echo $form->field($model, 'ADR') ?>

    <?php // echo $form->field($model, 'DOTWATCHER') ?>

    <?php // echo $form->field($model, 'PHOTO') ?>

    <?php // echo $form->field($model, 'HOMECARE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
