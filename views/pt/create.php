<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pt */

$this->title = 'Create Pt';
$this->params['breadcrumbs'][] = ['label' => 'Pts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pt-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
//        'model' => $model,
                'model' => $model,
                'modelDiag'=>$modelDiag
    ]) ?>

</div>
