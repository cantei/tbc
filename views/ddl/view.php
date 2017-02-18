<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ddl */

$this->title = $model->TBNUMBER;
$this->params['breadcrumbs'][] = ['label' => 'Ddls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ddl-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->TBNUMBER], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->TBNUMBER], [
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
            'TBNUMBER',
            'VILLAGE_ID',
            'MOO',
            'DISTRICT',
            'AMPHUR',
            'PROVINCE',
            'PCU',
            'PHONE',
        ],
    ]) ?>

</div>
