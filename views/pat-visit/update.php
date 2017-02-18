<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Patvisit */

$this->title = 'Update Patvisit: ' . $model->VISIT_ID;
$this->params['breadcrumbs'][] = ['label' => 'Patvisits', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->TBNUMBER.'visit id ='.$model->VISIT_ID
                                    , 'url' => ['list'
                                                , 'id' => $model->VISIT_ID
                                                ,'tbnumber'=>$model->TBNUMBER
                                                ]
                                  ];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="patvisit-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
