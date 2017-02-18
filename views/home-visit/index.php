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
        <?php // echo Html::a('Create Homevisit', ['create'], ['class' => 'btn btn-success']) ?>
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
            'ADR',

//            ['class' => 'yii\grid\ActionColumn'],
            [
                            'class' => 'yii\grid\ActionColumn',
                            'buttonOptions'=>['class'=>'btn btn-info'],
                            'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {delete}  </div>',
                            'options'=> ['style'=>'width:220px; text-align:center;'],
                            'buttons'=>[
                                'view' => function($url,$data,$key){
                                    return Html::a('<span class="btn-label"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;ดูรายละเอียด</span>',
                                  //return Html::a('<i class="glyphicon glyphicon-stats"></i>',
                                    ['home-visit/list'    
                                        ,'tbnumber'=>$data['TB_ID']
//                                        ,'hospcode'=>$hospcode
                                    ],
                                    ['class'=>'btn btn-info']);
                                },
                                'delete' => function($url,$data,$key){
                                    return Html::a('<span class="btn-label"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;ลบ</span>',                                
                                    ['home-visit/delete'    
                                     ,'id'=>$data['ID']
//                                        ,'hospcode'=>$hospcode
                                    ],
                                    ['class'=>'btn btn-danger']);
                                }
                              ]
           ],   
            
        ],
    ]); ?>
</div>
