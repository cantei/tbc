<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DdlSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ddls';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ddl-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ddl', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'TBNUMBER',
            'VILLAGE_ID',
            'MOO',
            'DISTRICT',
            'AMPHUR',
            // 'PROVINCE',
            // 'PCU',
            // 'PHONE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
