<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pat */

$this->title = 'Update Pat: ' . $model->TBNUMBER;
$this->params['breadcrumbs'][] = ['label' => 'Pats', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TBNUMBER, 'url' => ['view', 'id' => $model->TBNUMBER]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pat-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
