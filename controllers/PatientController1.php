<?php

namespace app\controllers;

use Yii;
use app\models\Patient;
use app\models\PatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;
use app\models\Province;
use app\models\Amphur;
use app\models\District;
use app\models\Villa;
use app\models\Uploads;
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


//        $villa= new Villa();
//   $villagename = Villa::find()->where(['VILLAGE_ID'=>$model->MOO])->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
//            'villa'=>$villa,
        ]);
    }

    /**
     * Displays a single Patient model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
      
//         $model2 = Villa::find()->where(['VILLAGE_ID' =>$model->MOO])->one();
//         \yii\helpers\VarDumper::dump($model2);
//         exit();
        return $this->render('view', [
            'model' => $model,
//            'model2' => $model2,
        ]);
    }

    /**
     * Creates a new Patient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Patient();
        
      

//        $amphur         = ArrayHelper::map($this->getAmphur($model->PROVINCE),'id','name');
        $district       = ArrayHelper::map($this->getDistrict($model->AMPHUR),'id','name');
        $village       = ArrayHelper::map($this->getVillage($model->VILLAGE_ID),'id','name');
        
        
        
        if ($model->load(Yii::$app->request->post())  ) {
            $data = Yii::$app->request->post();            
            $model->DATE_REG = date('Y-m-d', strtotime($data['Patient']['DATE_REG']));
            $model->validate();
            $model->save();
            return $this->redirect(['view', 'id' => $model->TBNUMBER]);
        } else {
            return $this->render('create', [
                'model' => $model,
//                'amphur'=>$amphur,
                'district' =>[],
                'village'=>[], 
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

        if ($model->load(Yii::$app->request->post())) {
            $data = Yii::$app->request->post();            
//            
//            \yii\helpers\VarDumper::dump($data);
//            exit();
            $model->DATE_REG = date('Y-m-d', strtotime($data['Patient']['DATE_REG']));
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->TBNUMBER]);
        } else {
            return $this->render('update', [
                'model' => $model,
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
