<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatvisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'จำนวนวันที่เยี่ยมบ้าน';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patvisit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

   
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'TBNUMBER',
            'FNAME',
            'LNAME',
            'REG_DATE',
//            'villa.VILLAGE_CODE',
//            'villa.VILLAGE_NAME',
//            'cnt',
            [
                'attribute' => 'Total',
//                        'class' => 'yii\grid\DataColumn',
                'format' => 'html',
                'value' => function($data){
//                    return Html::a($data->getVisitCount(),'#',['style'=>'font-size:15px','class' => 'label label-success']);
//        return Html::a($data->getVisitCount(),'#',['class' => 'badge']); 
                    return Html::a($data->getVisitCount(),'#',['style'=>'font-size:14px','class' => 'label label-pill label-info']);
                },
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'buttonOptions'=>['class'=>'btn btn-info'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {view} {print}  </div>',
                'options'=> ['style'=>'width:20px; text-align:center;'],
                'buttons'=>[
                    'view' => function($url,$data,$key){
                        return Html::a('<span class="btn-label"><i class="glyphicon glyphicon-list-alt"></i>&nbsp;&nbsp;ดูรายละเอียด</span>',
                      //return Html::a('<i class="glyphicon glyphicon-stats"></i>',
                        ['pat-visit/list'    
                            ,'tbnumber'=>$data['TBNUMBER']
                        ],
                        ['class'=>'btn btn-info']);
                    }
                  ]
           ],  
        ],
    ]); ?>
</div>
