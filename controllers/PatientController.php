<?php

namespace app\controllers;

use Yii;
use app\models\Patient;
use app\models\PatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use  yii\base\Model;
use app\models\Organs;
use app\models\Grouppt;
use app\models\Outcomes;
use app\models\Province;
use app\models\Amphur;
use app\models\District;
use app\models\Villa;
use app\models\Uploads;

use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use yii\helpers\Html;
use yii\helpers\Url;







/**
 * PatientController implements the CRUD actions for Patient model.
 */
class PatientController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Patient models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatientSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Patient model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
//        $model = new Patient();
        $model = Patient::find()
            ->where(['ID' => $id])
            ->one();
       
        
        return $this->render('view', [
            'model' => $model,
//             'details'=>$details
          
        ]);
        /*
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
         * 
         */
    }

    /**
     * Creates a new Patient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Patient();
        $tuberculosis = new \app\models\Tuberculosis();
        $outcomes=new Outcomes();
/*
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
 */
        if($model->load(Yii::$app->request->post()) &&
              $tuberculosis->load(Yii::$app->request->post()) 
              && $model->validate()
//              Model::validateMultiple([$model,$tuberculosis])
              )
            {
                $data = Yii::$app->request->post();
                $model->DATE_REG = date('Y-m-d', strtotime($data['Patient']['DATE_REG']));
                $model->CID =str_replace("-","",( $data['Patient']['CID']));  
//                \yii\helpers\VarDumper::dump($model,10,true);
                if($model->save()){
                    $tuberculosis->TB_ID = $model->TBNUMBER;
                    $tuberculosis->MDTDATE= date('Y-m-d', strtotime($data['Tuberculosis']['MDTDATE']));
                    $tuberculosis->save(false);
                    $outcomes->TBNUMBER=$model->TBNUMBER;
                    $outcomes->save(false);
                }
               return $this->redirect(['view', 'id' => $model->ID]);
           } else {
                return $this->render('create', [
                   'model' => $model,
                   'tuberculosis'=>$tuberculosis
                ]);
           }
    }

    /**
     * Updates an existing Patient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $tuberculosis = \app\models\Tuberculosis::find()->where(['TB_ID' =>$model->TBNUMBER])->one();
//        $organ = Organs::find()->where(['ID' =>$tuberculosis->SITES])->one();
//        \yii\helpers\VarDumper::dump($model);
//        echo '<br>';
//          \yii\helpers\VarDumper::dump($tuberculosis);
//        exit();
//        $grp = \app\models\Grouppt::find()->where(['ID' =>$tuberculosis->GROUPS])->one();
        if ($model->load(Yii::$app->request->post()) && $tuberculosis->load(Yii::$app->request->post())  
                && $model->validate()
            ) {
                    $data = Yii::$app->request->post();
                    $model->DATE_REG = date('Y-m-d', strtotime($data['Patient']['DATE_REG']));
                if($model->save()){
                    $tuberculosis->MDTDATE= date('Y-m-d', strtotime($data['Tuberculosis']['MDTDATE']));
                    $tuberculosis->TB_ID = $model->TBNUMBER;
                    $tuberculosis->save(false);
                }
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'tuberculosis'=>$tuberculosis,
            ]);
        }
    }

    /**
     * Deletes an existing Patient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Patient model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Patient the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Patient::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
       
    public function actionGetDistrict() {
     $out = [];
     if (isset($_POST['depdrop_parents'])) {
         $ids = $_POST['depdrop_parents'];
//         $province_id = empty($ids[0]) ? null : $ids[0];
         $amphur_id = empty($ids[0]) ? null : $ids[0];
         if ($amphur_id != null) {
            $data = $this->getDistrict($amphur_id);
            echo Json::encode(['output'=>$data, 'selected'=>'']);
            return;
         }
     }
     echo Json::encode(['output'=>'', 'selected'=>'']);
    } 
    
    protected function getDistrict($id){
     $datas = District::find()->where(['AMPHUR_ID'=>$id])->all();
     return $this->MapData($datas,'DISTRICT_ID','DISTRICT_NAME');
    }
    
    public function actionGetVillage() {
     $out = [];
     if (isset($_POST['depdrop_parents'])) {
         $ids = $_POST['depdrop_parents'];
         $amphur_id = empty($ids[0]) ? null : $ids[0];
         $district_id = empty($ids[1]) ? null : $ids[1];
//           $district_id = empty($ids[2]) ? null : $ids[2];
         if ($amphur_id != null) {
            $data = $this->getVillage($district_id);
            echo Json::encode(['output'=>$data, 'selected'=>'']);
            return;
         }
     }
     echo Json::encode(['output'=>'', 'selected'=>'']);
    } 
    
    protected function getVillage($id){
        $datas =Villa::find()->where(['SUBDIST_ID'=>$id])->all();
        return $this->MapData($datas,'VILLAGE_ID','VILLAGE_NAME');
    }
    
    
    
    protected function MapData($datas,$fieldId,$fieldName){
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id'=>$value->{$fieldId},'name'=>$value->{$fieldName}]);
        }
        return $obj;
    }
    
    
    
    
    
    
    
    
    
    
    
}
