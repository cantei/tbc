<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Homevisit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="homevisit-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($patient, 'TBNUMBER')->textInput(['maxlength' => true]) ?>

   

    <?= $form->field($model, 'REF')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'VISITDATE')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update'
                , ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) 
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
