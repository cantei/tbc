<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Homevisit */
//yii\helpers\VarDumper::dump($model,10,true);die;


$this->title ='เลขทะเบียน'.$row->TB_ID;
$this->params['breadcrumbs'][] = ['label' => 'Homevisits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'ประวัติเยี่ยมบ้าน'
                                        , 'url' => ['home-visit/list'
                                                         ,'tbnumber'=>$row->TB_ID
                                                            
                                                    ]
                                 ];



$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homevisit-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a('Update', ['update', 'id' => $id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php 
        echo DetailView::widget([
        'model' => $model,
            'attributes' => [
                [
//                    'attribute' => 'ID',
                    'label' => "Record ID",
                     'value'=>$row->ID,                   
                ],
                [
                    'label' => "เลขทะเบียน",
                     'value'=>$row->TB_ID,                   
                ],
                [
                    'label' => "วันที่เยี่ยมบ้าน",
                     'value'=>$row->VISITDATE,                   
                ],
                'TB_ID',
                'REF',
                'VISITDATE',
                'FOOD',
                'DAILYDOSE',
                'ADR',
                'DOTWATCHER',
                'PHOTO',
                'HOMECARE:ntext',
            ],
        ]) 
    ?>

</div>
<?php
 yii\helpers\VarDumper::dump($row,10,true);
?>