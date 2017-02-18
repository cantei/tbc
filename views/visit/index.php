<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HomevisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Homevisits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homevisit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Homevisit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'TB_ID',
            'REF',
            'VISITDATE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
