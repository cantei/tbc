<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Homevisit */

//$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Homevisits', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="homevisit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php // echo  Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?php 
            /*
            echo  Html::a('Delete', ['delete', 'id' => $model->ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) 
             */
        ?>
             
    </p>

    <?php
//    echo $tb_id
//yii\helpers\VarDumper::dump($model,10,true);
    
    
        echo DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'ID',
            'TB_ID',
//            'REF',
            'VISITDATE',
            'FOOD',
            'DAILYDOSE',
            'ADR',
//            'ADR_MDT1',
//            'ADR_MDT2',
//            'ADR_MDT3',
//            'ADR_MDT4',
//            'ADR_MDT5',
//            'ADR_MDT6',
//            'ADR_MDT7',
            'DOTWATCHER',
//            'PHOTO',
//            'HOMECARE:ntext',
        ],
    ]) 
     
    ?>


</div>
