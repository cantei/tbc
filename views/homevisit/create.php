<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Homevisit */

$this->title = 'Create Homevisit';
$this->params['breadcrumbs'][] = ['label' => 'Homevisits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homevisit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
