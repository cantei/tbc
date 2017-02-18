<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Ddl */

$this->title = 'Create Ddl';
$this->params['breadcrumbs'][] = ['label' => 'Ddls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ddl-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
