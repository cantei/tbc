<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pat */

$this->title = $model->TBNUMBER;
$this->params['breadcrumbs'][] = ['label' => 'Pats', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pat-view">

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
            'REG_DATE',
            'TBNUMBER',
            'HN',
            'FNAME',
            'LNAME',
            'CID',
            'SEX',
            'AGE',
            'BW',
            'HNO',
            'VILLAGE_ID',
            'DISTRICT',
            'AMPHUR',
            'PROVINCE',
            'PHONE',
            'MEMO',
        ],
    ]) ?>

</div>
