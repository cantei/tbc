<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pt */

$this->title = 'Update Pt: ' . $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Pts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->ID, 'url' => ['view', 'id' => $model->ID]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pt-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'regist'=>$regist,
    ]) ?>

</div>
