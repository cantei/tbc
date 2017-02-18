<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pat */

$this->title = 'Create Pat';
$this->params['breadcrumbs'][] = ['label' => 'Pats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pat-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
