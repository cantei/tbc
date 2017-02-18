<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Patient */

//$this->title = 'Update Patient: ' . $model->TBNUMBER;
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TBNUMBER, 'url' => ['view', 'id' => $model->TBNUMBER]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="patient-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
//        'drugcat'=>$drugcat,
//        'illness'=>$illness
    ]) ?>

    

</div>
