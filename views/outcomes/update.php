<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Outcomes */

$this->title = 'Update Outcomes: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Outcomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="outcomes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
         'patient'=>$patient,
    ]) ?>

</div>
