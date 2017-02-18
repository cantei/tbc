<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Patvisit */


$this->title = $model->TBNUMBER;
$this->params['breadcrumbs'][] = ['label' => 'count visit  all', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => '', 'url' => ['/pat-visit/list','tbnumber'=>$tbnumber]];
$this->params['breadcrumbs'][] = ['label' => 'list this', 'url' => ['/pat-visit/list','tbnumber'=>$tbnumber]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patvisit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->VISIT_ID], ['class' => 'btn btn-warning']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->VISIT_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'VISIT_ID',
            'TBNUMBER',
            'VISIT_DATE',
            'REF',
            'FOOD',
            'DAILYDOSE',
            'ADR',
            'DOTWATCHER',
            'PHOTO',
            'HOMECARE:ntext',
        ],
    ]) ?>

</div>
