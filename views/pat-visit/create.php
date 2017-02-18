<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Patvisit */

$this->title = 'Create Patvisit';
$this->params['breadcrumbs'][] = ['label' => 'Patvisits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'View List', 'url' => ['/pat-visit/list','tbnumber'=>$tbnumber]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patvisit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
