<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

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

            'HN',
            'TBNUMBER',
            'FNAME',
            'LNAME',
            
//            'REF',
//            'VISITDATE',
//            'FOOD',
            // 'DAILYDOSE',
            // 'ADR',
            // 'ADR_MDT1',
            // 'ADR_MDT2',
            // 'ADR_MDT3',
            // 'ADR_MDT4',
            // 'ADR_MDT5',
            // 'ADR_MDT6',
            // 'ADR_MDT7',
            // 'DOTWATCHER',
            // 'PHOTO',
            // 'HOMECARE:ntext',
//'class' => 'yii\grid\ActionColumn',
//    'template' => '{leadView} ',
//    'buttons' => [
////       'leadView' => function ($url, $model) {
////           $url = Url::to(['controller/lead-view', 'id' => $model->whatever_id]);
////          return Html::a('<span class="fa fa-eye"></span>', $url, ['title' => 'view']);
////       },
//       'leadView' => function ($url, $model) {
//           $url = Url::to(['home-visit/update', 'id' => $model->ID]);
//           return Html::a('<span class="fa fa-pencil"></span>', $url, ['title' => 'update']);
//       },
//],
//            ['class' => 'yii\grid\ActionColumn'],
            [
   'attribute' => 'some_title',
    'format' => 'raw',
    'value' => function ($model) {    
        $url = Url::to(['home-visit/create', 'id' => $model->ID]);
        return '<a href="'.$url .'">your Text</a>';
    },
],
        ],
    ]); ?>
</div>
