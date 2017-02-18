<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\HomevisitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'นับจำนวนครั้งที่เยี่ยมบ้าน';
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

      
            'TBNUMBER',
            'FNAME',
            'LNAME',
            'HNO',
            'villa.VILLAGE_CODE',
            'villa.VILLAGE_NAME',
//            'cnt',
            [
                        'attribute' => 'Total',
//                        'class' => 'yii\grid\DataColumn',
                        'format' => 'html',
                        'value' => function($data){
                            return Html::a($data->getVisitCount(),'#',['class' => 'label label-primary']);
                        },
            ],


            
        ],
    ]); ?>
</div>
