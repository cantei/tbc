<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Patient */

$this->title = $model->TBNUMBER;
$this->params['breadcrumbs'][] = ['label' => 'Patients', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patient-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->TBNUMBER], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->TBNUMBER], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'DATE_REG',
            'TBNUMBER',
            'HN',
            'FNAME',
            'LNAME',
            'CID',
            'SEX',
            'AGE',
            'BW',
            'HNO',
            'ROAD',
            'VILLAGE_ID',
            'MOO',
            'DISTRICT',
            'AMPHUR',
            'PROVINCE',
            'PCU',
            'PHONE',
        ],
    ]) ?>

   <?php 
// $drugcat = \app\models\Drugcat::find()->where(['TBNUMBER' =>$model->TBNUMBER])->one();
// yii\helpers\VarDumper::dump($drugcat);
//   $no=$model->TBNUMBER;
//   $drugcat = \app\models\Drugcat::find()->where(['TBNUMBER' =>$no])->one();
//   yii\helpers\VarDumper::dump($drugcat);
   ?>
</div>
<?php 
//echo $model->TBNUMBER;

 // $details=app\models\Diag::find()->where(['TB_ID' =>$model->TBNUMBER])->one();
    yii\helpers\VarDumper::dump($model);
?>