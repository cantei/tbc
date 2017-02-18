<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Homevisit */

$this->title = 'Create Homevisit: ' . $patient->TBNUMBER;
$this->params['breadcrumbs'][] = ['label' => 'Homevisits', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Create';
?>
<div class="homevisit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'=>$model,
//        'patient' => $patient,
    ]) ?>

</div>
