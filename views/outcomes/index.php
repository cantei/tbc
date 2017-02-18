<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OutcomesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Outcomes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outcomes-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Outcomes', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'TBNUMBER',
            [
            'label' => 'ชื่อ',
            'attribute' => 'fname',
            'value' => 'patient.FNAME',
            ],
            [
            'label' => 'สกุล',
            'attribute' => 'lname',
            'value' => 'patient.LNAME',
//            'value' => '',
            ],
          
//            'OUTCOME_ID',
            [
            'label' => 'ผลการรักษา',
            'attribute' => 'outcomes',
            'value' => 'outcometype.OUTCOME_NAME',
//            'value' => '',
            ],
            'OUTCOME_DATE',

            [
                'class' => 'yii\grid\ActionColumn',
                'buttonOptions'=>['class'=>'btn btn-default'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group">{view} {update} {delete} </div>',
                'options'=> ['style'=>'width:150px;'],
                'buttons'=>[
                  'copy' => function($url,$model,$key){
                      return Html::a('<i class="glyphicon glyphicon-duplicate"></i>',$url,['class'=>'btn btn-default']);
                    }
                  ]
            ],
        ],
    ]); ?>
</div>
