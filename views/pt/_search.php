<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PtSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pt-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'TBNUMBER') ?>

    <?= $form->field($model, 'HN') ?>

    <?= $form->field($model, 'FNAME') ?>

    <?= $form->field($model, 'LNAME') ?>

    <?php // echo $form->field($model, 'DISTRICT') ?>

    <?php // echo $form->field($model, 'DISTRICT_ID') ?>

    <?php // echo $form->field($model, 'AMPHUR_ID') ?>

    <?php // echo $form->field($model, 'AMPHUR') ?>

    <?php // echo $form->field($model, 'PROVINCE_ID') ?>

    <?php // echo $form->field($model, 'PROVINCE') ?>

    <?php // echo $form->field($model, 'PHONE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
