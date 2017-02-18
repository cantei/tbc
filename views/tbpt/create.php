<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Tbpt */

$this->title = 'Create Tbpt';
$this->params['breadcrumbs'][] = ['label' => 'Tbpts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbpt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cat'=>$cat
    ]) ?>

</div>
