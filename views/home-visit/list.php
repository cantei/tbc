<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Homevisit */
//         \yii\helpers\VarDumper::dump($model,10,true);
//            exit();
//$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Homevisits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homevisit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('เพิ่มข้อมูลเยี่ยมบ้าน'
                , ['create', 'tbnumber' =>$tbnumber
                ]              
                , ['class' => 'btn btn-primary']
            ) 
        ?>
        
    </p>

    <?php 
//        echo  DetailView::widget([
//        'model' => $model,
//        'attributes' => [
////            'ID',
//            'TB_ID',
//             [
//            'attribute' => 'VISITDATE',
//            'value' => function ($model) {
//                return $model['Homevisit']['TB_ID'];
//            },
//            'visible' => \Yii::$app->user->can('posts.owner.view'),
//        ],
//             [                                                  // the owner name of the model
//                'label' => 'Owner',
//                'value' => $model->Homevisit->TB_ID,            
////                'contentOptions' => ['class' => 'bg-red'],     // HTML attributes to customize value tag
////                'captionOptions' => ['tooltip' => 'Tooltip'],  // HTML attributes to customize label tag
//            ],
//            'REF',
//            'VISITDATE',
//            ['attribute'=>'VISITDATE'
//                ,'value'=>$model->Homevisit->TB_ID
//            ],
//            'value' => implode(\yii\helpers\ArrayHelper::map($model->Homevisit, 'VISITDATE', 'VISITDATE')),
//            [
//                'format'=>'raw',
//                'label'=>'photos',
//                'value'=>function($model){
//                    return $model->TB_ID;
//                }
//            ]
//        ],
//    ]) 
    ?>
<?php 
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        // Simple columns defined by the data contained in $dataProvider.
        // Data from the model's column will be used.
//         'ID',
        'TB_ID',
        'VISITDATE',
        'ADR',
        // More complex one.
//        [
//            'class' => 'yii\grid\DataColumn', // can be omitted, as it is the default
//            'value' => function ($data) {
//                return $data->name; // $data['name'] for array data, e.g. using SqlDataProvider.
//            },
//        ],
        [
                'class' => 'yii\grid\ActionColumn',
                'buttonOptions'=>['class'=>'btn btn-info'],
                'template'=>'<div class="btn-group btn-group-sm text-center" role="group"> {edit} {delete} {print}  </div>',
                'options'=> ['style'=>'width:200px; text-align:center;'],
                'buttons'=>[
                    'edit' => function($url,$data,$key){
                        return Html::a('<span class="btn-label"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;แก้ไข</span>',

                        ['home-visit/update'    
//                            ,'cid'=>http_build_query($cid)
                                ,'id'=>$data->ID
                        ],
                        ['class'=>'btn btn-warning']);
                    },
                    'delete' => function($url,$data,$key){
                        return Html::a('<span class="btn-label"><i class="glyphicon glyphicon-trash"></i>&nbsp;&nbsp;ลบ</span>',
                        ['home-visit/delete'
                            ,'data-method'=>'post'
                            ,'id'=>$data->ID
                        ],
                        ['class'=>'btn btn-danger']);
                    },
                    'print' => function($url,$data,$key){
                        return Html::a('<span class="btn-label"><i class="glyphicon glyphicon-print"></i>&nbsp;&nbsp;พิมพ์</span>',
                        ['home-visit/print'    
                            ,'id'=>$data->ID,
                        ],                        
                        ['class'=>'btn btn-info']);
                    },
//                    'delete' => function($url,$data,$key){
//                        return Html::a('<i class="fa fa-sign-out"></i>',
//                        ['/home-visit/delete'],
//                        ['class'=>'btn btn-default btn-flat'], //optional* -if you need to add style
//                        ['data' => ['method' => 'post',]]);
//                                 },
                     
                    
                  ],
            ], // action column
            [
                'label'=>'date',
//                'attribute'=>'homevisit.VISITDATE',
                'value'=>function ($model, $key, $index, $column) {
                    return $model->ID;
                },
            ],
    ],
]);
?>
</div>
