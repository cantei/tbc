<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Outcomes */

$this->title = $model->ID;
$this->params['breadcrumbs'][] = ['label' => 'Outcomes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="outcomes-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->ID], ['class' => 'btn btn-primary']) ?>
        <?php // echo Html::a('Delete', ['delete', 'id' => $model->ID], [
            // 'class' => 'btn btn-danger',
            // 'data' => [
               //  'confirm' => 'Are you sure you want to delete this item?',
                // 'method' => 'post',
            //],
        //]) 
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'ID',
            'TBNUMBER',
            'patient.FNAME',
            'patient.LNAME',
//            'tuberculosis.SITES',
//            [                      // the owner name of the model
//                'label' => 'จำแนกผู้ป้วย',
//                'type' => 'raw',
//                'value' => (($model->tuberculosis->SITES ==1) ? "P"
//                                :(($model->tuberculosis->SITES ==2)? "EP" 
////                                :(($model->tuberculosis->GROUPS ==3)? "TAF" 
////                                :(($model->tuberculosis->GROUPS ==4)? "TAD"
////                                :(($model->tuberculosis->GROUPS ==5)? "TI"
////                                :(($model->tuberculosis->GROUPS ==6)? "Other"
//                                        : "NULL"
//                                  )
//                            ),
//            ],
            'outcometype.OUTCOME_NAME',
            'OUTCOME_DATE',
        ],
    ]) ?>

</div>
