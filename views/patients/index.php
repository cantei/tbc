<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PatientsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Patients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patients-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Patients', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'ID',
            'DATE_REG',
            'TBNUMBER',
            'HN',
            'FNAME',
            'LNAME',
            // 'DISTRICT',
            // 'DISTRICT_ID',
            // 'AMPHUR_ID',
            // 'AMPHUR',
            // 'PROVINCE_ID',
            // 'PROVINCE',
            // 'PHONE',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
