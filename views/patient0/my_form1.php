<?php 
use kartik\widgets\DatePicker;
use yii\helpers\ArrayHelper;
use app\models\Province;
use app\models\Amphur;
use app\models\District;
use app\models\Drugcat;
use kartik\depdrop\DepDrop;
use yii\helpers\Url;
?>
<br>

<div class="row">
    
    <div class="col-sm-4 col-md-4">
        <?php echo '<label class="control-label">วันที่ลงทะเบียน</label>'; ?>
        <?=  DatePicker::widget([
            'model' => $model,
            'attribute' => 'DATE_REG',
            'pluginOptions' => [
                    'format' => 'dd-M-yyyy',
                    'startDate' => date('Y-m-d'),
                    'todayHighlight' => true,
                    'autoclose'=>TRUE
                 ]     
            //'language' => 'ru',
            //'dateFormat' => 'yyyy-MM-dd',
        ]);
        ?>
    </div>
    <div class="col-sm-4 col-md-4">
      <?= $form->field($model, 'TBNUMBER')->textInput(['readonly' => !$model->isNewRecord]) ?>
    </div>
    <div class="col-sm-4 col-md-4">
         <?= $form->field($model, 'HN')->textInput(['maxlength' => 20]) ?>
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
            <div class="col-sm-3 col-md-3">
                <?= $form->field($drugcat, 'PHONE')->textInput(['maxlength' => true]) ?>
            </div>
                
        </div>


<?php 
//                yii\helpers\VarDumper::dump($form,10,true);
?>
