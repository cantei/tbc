<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DdlSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ddl-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TBNUMBER') ?>

    <?= $form->field($model, 'VILLAGE_ID') ?>

    <?= $form->field($model, 'MOO') ?>

    <?= $form->field($model, 'DISTRICT') ?>

    <?= $form->field($model, 'AMPHUR') ?>

    <?php // echo $form->field($model, 'PROVINCE') ?>

    <?php // echo $form->field($model, 'PCU') ?>

    <?php // echo $form->field($model, 'PHONE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
