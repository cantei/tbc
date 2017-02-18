<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TbptSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tbpts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbpt-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tbpt', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'ID',
            'TBNUMBER',
            'FNAME',
            'LNAME',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
