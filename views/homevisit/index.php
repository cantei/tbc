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
            'FOOD',
            // 'DAILYDOSE',
            // 'ADR',
            // 'DOTWATCHER',
            // 'PHOTO',
            // 'HOMECARE:ntext',

            ['class' => 'yii\grid\ActionColumn'],
            [
                            'class' => 'yii\grid\ActionColumn',
                            'buttonOptions'=>['class'=>'btn btn-info'],
                            'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {print}  </div>',
                            'options'=> ['style'=>'width:20px; text-align:center;'],
                            'buttons'=>[
                                'view' => function($url,$data,$key){
                                    return Html::a('<span class="btn-label"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;ดูรายละเอียด</span>',
                                  //return Html::a('<i class="glyphicon glyphicon-stats"></i>',
                                    ['homevisit/create'    
                                        ,'tbnumber'=>$data['TB_ID']
//                                        ,'hospcode'=>$hospcode
//                                        ,'time_id'=>$time_id
//                                        ,'chronic_code'=>$chronic_code
//                                        ,'labcode'=>$labcode
//                                        ,'visit'=>$data['DATE_SERV']

                                    ],
                                    ['class'=>'btn btn-default']);
                                }
                              ]
           ],            
        ],
    ]); ?>
</div>
