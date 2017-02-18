<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Homevisit */
//         \yii\helpers\VarDumper::dump($model,10,true);
//            exit();
$this->title = $tbnumber;
$this->params['breadcrumbs'][] = ['label' => 'count visit  all', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if (Yii::$app->session->hasFlash('success')): ?>
  <div class="alert alert-success alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>Saved!</h4>
  <?= Yii::$app->session->getFlash('success') ?>
  </div>
<?php endif; ?>
<?php if (Yii::$app->session->hasFlash('error')): ?>
  <div class="alert alert-danger alert-dismissable">
  <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
  <h4><i class="icon fa fa-check"></i>คำเตือน!</h4>
  <?= Yii::$app->session->getFlash('error') ?>
  </div>
<?php endif; ?>
<div class="homevisit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('เพิ่มข้อมูลเยี่ยมบ้าน'
                , ['create', 'tbnumber' =>$tbnumber
                ]              
                , ['class' => 'btn btn-success']
            ) 
        ?>
        
    </p>

<?php 
echo GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        // Simple columns defined by the data contained in $dataProvider.
        // Data from the model's column will be used.
//         'ID',
        'TBNUMBER',
        'VISIT_DATE',
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
                'options'=> ['style'=>'width:-80px; text-align:center;'],
                'buttons'=>[                            
                    'edit' => function($url,$data,$key){ // การ get ค่า  relation  ต้องมีฟังก์ชั่นสำหรับรีเทริ์นค่าออกมาจาก model
                        return Html::a('<span class="btn-label"><i class="glyphicon glyphicon-edit"></i>&nbsp;&nbsp;แก้ไข</span>',
                        ['pat-visit/update'    
//                            ,'cid'=>http_build_query($cid)
                            ,'id'=>$data->VISIT_ID
                        ],
                        ['class'=>'btn btn-warning']);
                    },
                    'delete' => function($url,$data,$key){ 
                    // $options = ['class' => ['btn', 'btn-default']];
                        // echo Html::tag('div', 'Save', $options);
                        return Html::a(Html::tag('div',
                                    Html::tag('i', '', ['class' => 'glyphicon glyphicon-trash'])  .
                                    Html::tag('span', ' ลบ', ['class' => 'btn-label'])
                                )
                                , Url::to(['pat-visit/delete', 'id' =>$data->VISIT_ID,'tbnumber'=>$data->TBNUMBER])
                                ,['class'=>'btn btn-danger']);
                    
                    },
                    'print' => function($url,$data,$key){ 
                        return Html::a('<span class="btn-label"><i class="glyphicon glyphicon-print"></i>&nbsp;&nbsp;พิมพ์</span>',
                        ['pat-visit/print'    
                            ,'id'=>$data->VISIT_ID
                        ],                        
                        ['class'=>'btn btn-info']);
                    },                    
                  ],
            ], // action column
            [
                'label'=>'SEQ',
//                'attribute'=>'homevisit.VISITDATE',
                'value'=>function ($model, $key, $index, $column) {
                    return $model->VISIT_ID;
                },
            ],
    ],
]);
?>
</div>
<?php 
    $this->registerJs(" $('.btn-primary').click(function(){
                            if(!confirm('คุณแน่ใจหรือไม่ !')){
                                return  false;
                            }
                        }); "
                    );
?>


<?php  
//$script = <<< JS
//function myfunction() {
//    alert(555);
//}
//JS;
//$this->registerJs($script);
?>