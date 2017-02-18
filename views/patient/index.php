<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Add Patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <h1><?php // echo Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('เพิ่มผู้ป่วย', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'sort'=> ['defaultOrder' => ['TBNUMBER'=>SORT_DESC]],

//            'ID',
            'DATE_REG',
            'TBNUMBER',
            'HN',
            'FNAME',
             'LNAME',
            // 'CID',
            // 'SEX',
             'AGE',
            // 'BW',
            // 'HNO',
            // 'ROAD',
            // 'VILLAGE_ID',
            // 'MOO',
            // 'DISTRICT',
            // 'AMPHUR',
            // 'PROVINCE',
            // 'PCU',
            // 'PHONE',

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
