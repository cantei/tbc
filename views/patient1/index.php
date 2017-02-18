<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Patient', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'DATE_REG',
            'TBNUMBER',
            'HN',
            'FNAME',
            'LNAME',
            
//            [ // รวมคอลัมน์
//               'label'=>'ชื่อ-นามสกุล',
//               'format'=>'html',
//               'value'=>function($model, $key, $index, $column){
//                 return $model->FNAME.' '.$model->LNAME;
//               }
//            ],
            // 'CID',
            // 'SEX',
            // 'AGE',
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

//            ['class' => 'yii\grid\ActionColumn'],
            [
                'class' => 'yii\grid\ActionColumn',
                'buttonOptions'=>['class'=>'btn btn-default'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group">{copy} {view} {update} {delete} </div>',
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
