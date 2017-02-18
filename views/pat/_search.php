<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PatSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pat-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'REG_DATE') ?>

    <?= $form->field($model, 'TBNUMBER') ?>

    <?= $form->field($model, 'HN') ?>

    <?= $form->field($model, 'FNAME') ?>

    <?= $form->field($model, 'LNAME') ?>

    <?php // echo $form->field($model, 'CID') ?>

    <?php // echo $form->field($model, 'SEX') ?>

    <?php // echo $form->field($model, 'AGE') ?>

    <?php // echo $form->field($model, 'BW') ?>

    <?php // echo $form->field($model, 'HNO') ?>

    <?php // echo $form->field($model, 'VILLAGE_ID') ?>

    <?php // echo $form->field($model, 'DISTRICT') ?>

    <?php // echo $form->field($model, 'AMPHUR') ?>

    <?php // echo $form->field($model, 'PROVINCE') ?>

    <?php // echo $form->field($model, 'PHONE') ?>

    <?php // echo $form->field($model, 'MEMO') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
