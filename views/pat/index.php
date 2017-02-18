<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pats';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pat-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pat', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'REG_DATE',
            'TBNUMBER',
            'HN',
            'FNAME',
            'LNAME',
            // 'CID',
            // 'SEX',
            // 'AGE',
            // 'BW',
            // 'HNO',
            // 'VILLAGE_ID',
            // 'DISTRICT',
            // 'AMPHUR',
            // 'PROVINCE',
            // 'PHONE',
            // 'MEMO',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
