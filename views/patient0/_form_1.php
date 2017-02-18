<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use yii\helpers\Url;
use yii\helpers\ArrayHelper;


use kartik\widgets\DepDrop;

use app\models\Province;
use app\models\Amphur;
use app\models\District;
use app\models\Drugcat;
//use kartik\widgets\DateTimePicker;
use kartik\widgets\DatePicker;

use yii\bootstrap\Tabs;
/* @var $this yii\web\View */
/* @var $model app\models\Ptprofile */
/* @var $form yii\widgets\ActiveForm */
?>

<?php 
//\yii\helpers\VarDumper::dump($pt);
//exit();
?>
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
  <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>
  <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
</ul>

<div class="tab-content">
  <div id="home" class="tab-pane fade in active">
    <h3>ช้อมูลทั่วไป</h3>
    <div class="ptprofile-form">

    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-sm-4 col-md-4">
               <?= $form->field($model, 'TBNUMBER')->textInput(['readonly' => !$model->isNewRecord]) ?>
            </div>
            <div class="col-sm-4 col-md-4">
               <?= $form->field($model, 'HN')->textInput(['maxlength' => 20]) ?>
            </div>
            <div class="col-sm-4 col-md-4">
                
                
<?php echo '<label class="control-label">วันที่ลงทะเบียน</label>'; ?>
<?=  DatePicker::widget([
    'model' => $model,
    'attribute' => 'DATE_REG',
    'pluginOptions' => [
            'format' => 'dd-M-yyyy',
            'startDate' => date('Y-m-d'),
            'todayHighlight' => true
         ]     
    //'language' => 'ru',
    //'dateFormat' => 'yyyy-MM-dd',
]);
?>
                <?php
    //'language' => 'ru',
    //'dateFormat' => 'yyyy-MM-dd',

//           echo $form->field($model, 'DATE_REG')->widget(DatePicker::classname(), [
//    'options' => ['placeholder' => 'Enter birth date ...'],
//    'pluginOptions' => [
//        'autoclose'=>true
//    ]
//]);
              ?>
 
            </div>
        </div>

        <div class="row">
            <div class="col-sm-4 col-md-4">
                <?= $form->field($model, 'FNAME')->textInput(['maxlength' => 20]) ?>
            </div>
            <div class="col-sm-4 col-md-4">
                <?= $form->field($model, 'LNAME')->textInput(['maxlength' => 20]) ?>
            </div>
            <div class="col-sm-4 col-md-4">
                <?= $form->field($model, 'SEX')->textInput(['maxlength' => 20]) ?>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-2 col-md-2">
                <?= $form->field($model, 'AGE')->textInput(['maxlength' => 20]) ?>
            </div>
            <div class="col-sm-2 col-md-2">
                <?= $form->field($model, 'BW')->textInput(['maxlength' => 20]) ?>
            </div>
            <div class="col-sm-2 col-md-2">
                <?= $form->field($model, 'HNO')->textInput(['maxlength' => 20]) ?>
            </div>
            <div class="col-sm-4 col-md-4">
                <?= $form->field($model, 'ROAD')->textInput(['maxlength' => 20]) ?>
            </div>
            <div class="col-sm-2 col-md-2">
                <?= $form->field($model, 'MOO')->textInput(['maxlength' => 20]) ?>
            </div>

        </div>


        <div class="row">
            <div class="col-sm-3 col-md-3">
                <?=
                $form->field($model, 'PROVINCE')->dropdownList(
                        ArrayHelper::map(Province::find()->all(), 'PROVINCE_ID', 'PROVINCE_NAME'), [
                    'id' => 'ddl-province',
                    'prompt' => 'เลือกจังหวัด'
                ]);
                ?>

            </div>
            <div class="col-sm-3 col-md-3">
                <?=
                $form->field($model, 'AMPHUR')->widget(DepDrop::classname(), [
                    'options' => ['id' => 'ddl-amphur'],
                    'data' => [],
                    'pluginOptions' => [
                        'depends' => ['ddl-province'],
                        'placeholder' => 'เลือกอำเภอ...',
                        'url' => Url::to(['/ptprofile/get-amphur'])
                    ]
                ]);
                ?>
            </div>
            <div class="col-sm-3 col-md-3">
                <?=
                $form->field($model, 'DISTRICT')->widget(DepDrop::classname(), [
                    'options' => ['id' => 'ddl-district'],
                    'data' => [],
                    'pluginOptions' => [
                        'depends' => ['ddl-province', 'ddl-amphur'],
                        'placeholder' => 'เลือกตำบล...',
                        'url' => Url::to(['/ptprofile/get-district'])
                    ]
                ]);
                ?>
            </div>
            <div class="col-sm-3 col-md-3">
                <?= $form->field($model, 'PHONE')->textInput(['maxlength' => true]) ?>
            </div>
        </div>






  

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
  </div>
  <div id="menu1" class="tab-pane fade">
    <h3>Menu 1</h3>
    <p>
    <?php $form = ActiveForm::begin(); ?>

   
    <?= $form->field($model, 'PCU')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PHONE')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?></p>
  </div>
  <div id="menu2" class="tab-pane fade">
    <h3>Menu 2</h3>
    <p><?php// echo 'ใช้ยาสูตร  :'.$pt->DRUGCAT;?></p>
  </div>
</div>

<div class="row">
        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
        <?= Tabs::widget([
                'items' => [
                    [
                        'label' => 'One',
                        'content' => $this->render('my_form1', ['model' => $model]),
                        'active' => true
                    ],
                    [
                        'label' => 'Two',
                        'content' => $this->render('my_form2', ['model' => $model]),
                    ],
                ]]);
         ?>
    <?php ActiveForm::end(); ?>
</div>