<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;
/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<!-- adjust  column width  -->
<style>
table.detail-view th {
    width: 25%;
}

table.detail-view td {
    width: 40%;
}
</style>

<div class="patient-view">
    <div class="row">
        <div class="col-sm-2 col-md-2" >
            <p>
                <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Delete', ['delete', 'id' => $model->ID], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ],
                ]) ?>
             </p>
        </div>
        <div class="col-sm-8 col-md-8" >
            
    <?= DetailView::widget([
        'model' => $model,
        'condensed'=>true,
        'hover'=>true,
        
//        'alertContainerOptions' => ['style'=>'display:none'],
        'mode' => 'view',
//         'mode'=>Yii::$app->request->get('edit')=='t' ? DetailView::MODE_EDIT : DetailView::MODE_VIEW,
//        'panel'=>[
//            'heading'=>'Record ID  # ' . $model->ID,
//            'type'=>DetailView::TYPE_INFO,
////            'alertContainerOptions' => ['style'=>'display:none']
////            'alertContainerOptions'=>['class'=>'hide'],
//        ],
        'pluginOptions' => [ // Plugin options of the Kartik's FileInput widget 
    'fileActionSettings' => [
        'removeIcon' => '<span class="icon">delete</span> ',
    ]
],
        'attributes' => [
//            'ID',
//            'DATE_REG',
//            'TBNUMBER',
             [
                'attribute' => 'ID',
                'label' => "Record ID",
                'visible' => FALSE
            ],
            [
                'attribute' => 'DATE_REG',
                'label' => 'วันที่ขึ้นทะเบียน',
                'displayOnly' => true
            ],
            [
                'attribute' => 'TBNUMBER',
                'label' => 'เลขทะเบียนวัณโรค',
                'displayOnly' => true
            ],
            'HN',
            [                      // the owner name of the model
                'label' => 'ชื่อ-สกุล',
                'value' => $model->FNAME.'  '.$model->LNAME
            ],
//            'CID',
            [
                'attribute' => 'CID',
                'label' => 'เลขประจำตัว ปชช.',
                'displayOnly' => true,
                'value'=>substr($model->CID,0,1).'-'.substr($model->CID,1,4).'-'.substr($model->CID,5,5).'-'.substr($model->CID,10,2).'-'.substr($model->CID,12,1)
//                'mask' => '2 1001 01245 29 9',
            ],
            [     
                'label' => 'ที่อยู่',
                'value' => 'บ้านเลขที่   '.$model->HNO.'  หมู่ที่  '.$model->villa->VILLAGE_CODE
            ],
            [
                'label' => 'ตำบล-อำเภอ',
                'format'=>'raw',
                'value'=>' ตำบล '.$model->villa->SUBDIST_NAME
                        .' , '.' อำเภอ  '.$model->villa->AMPHUR_NAME.'  ('.$model->VILLAGE_ID.')'
            ],
            [                      // the owner name of the model
                'label' => 'เพศ',
                'value' => $model->SEX =1 ? 'ชาย' : 'หญิง',
            ],
            [
                'attribute' => 'AGE',
                'label' => 'อายุ(ปี)',
                'displayOnly' => true
            ],
            [
                'attribute' => 'BW',
                'label' => 'น้ำหนัก(กก.)',
                'displayOnly' => true
            ],          
//            [  
//                'label' => '',
//                'value' => 'ชื่อหมู่บ้าน &nbsp; &nbsp;'.$model->villa->SUBDIST_NAME.'หมู่ที่'.$model->villa->AMPHUR_NAME.'<span>1</span>&nbsp;<span>2</span>''
//            ],
//            [  
//                'label' => 'PCU',
//                'value' =>  $model->villa->HOSPNAME
//            ],
            
            'PHONE',
//            [                      // the owner name of the model
//                'label' => 'ประเภทผู้ป้วย',
//                'value' => $model->tuberculosis->SITES ? 'Pulmonary (วัณโรคปอด)' : 'Extrapulmonary (วัณโรคนอกปอด)',
//            ],
            [                      // the owner name of the model
                'label' => 'จำแนกผู้ป้วย',
                'type' => 'raw',
                'value' => (($model->tuberculosis->GROUPS ==1) ? "New"
                                :(($model->tuberculosis->GROUPS ==2)? "Relapse" 
                                :(($model->tuberculosis->GROUPS ==3)? "TAF" 
                                :(($model->tuberculosis->GROUPS ==4)? "TAD"
                                :(($model->tuberculosis->GROUPS ==5)? "TI"
                                :(($model->tuberculosis->GROUPS ==6)? "Other"
                                        : "NULL")))))),
            ],
//            [                      
//                'label' => 'สูตรยา',
//                'value' => ,
//            ],
            [                      
                'label' => 'วันที่เริ่มกินยา',
                'value' => $model->tuberculosis->MDTDATE.'   '.'('.$model->tuberculosis->MDTCAT.')'
            ],
            [                      
                'label' => 'เยี่ยมบ้าน',
                'value' => $model->MEMO
            ],
        ],
    ]) ?>

        </div>
       <div class="col-sm-2 col-md-2" >
            
        </div>
    </div>

</div>
