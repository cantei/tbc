<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use yii\helpers\BaseFileHelper;

use app\models\Province;
use app\models\Amphur;
use app\models\District;
use app\models\Villa;
use app\models\Uploads;
use app\models\Ddl;
use app\models\DdlSearch;

use yii\helpers\Html;
use yii\helpers\Url;







/**
 * DdlController implements the CRUD actions for Ddl model.
 */
class DdlController extends Controller
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
     * Lists all Ddl models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new DdlSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ddl model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Ddl model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ddl();
        $amphur         = ArrayHelper::map($this->getAmphur($model->PROVINCE),'id','name');
        $district       = ArrayHelper::map($this->getDistrict($model->AMPHUR),'id','name');
        $village       = ArrayHelper::map($this->getVillage($model->VILLAGE_ID),'id','name');
        
        
        if ($model->load(Yii::$app->request->post()) ) {
//            \yii\helpers\VarDumper::dump($district);
            $model->save();
            return $this->redirect(['view', 'id' => $model->TBNUMBER]);
        } else {
            return $this->render('create', [
               'model' => $model,
                'amphur'=> [],
                'district' =>[],
                'village'=>[]
                
            ]);
        }
    }

    /**
     * Updates an existing Ddl model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
//        $model->scenario = 'update';
        $amphur         = ArrayHelper::map($this->getAmphur($model->PROVINCE),'id','name');
        $district       = ArrayHelper::map($this->getDistrict($model->AMPHUR),'id','name');
        $village       = ArrayHelper::map($this->getVillage($model->VILLAGE_ID),'id','name');
        
        
        
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->TBNUMBER]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'amphur'=>$amphur,
                'district' =>[],
                'village'=>[],                        
            ]);
        }
    }

    /**
     * Deletes an existing Ddl model.
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
     * Finds the Ddl model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Ddl the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ddl::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    public function actionGetAmphur() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $province_id = $parents[0];
                $out = $this->getAmphur($province_id);
                echo Json::encode(['output'=>$out, 'selected'=>'']);
                return;
            }
        }
        echo Json::encode(['output'=>'', 'selected'=>'']);
    }
    protected function getAmphur($id){
        $datas = Amphur::find()->where(['PROVINCE_ID'=>$id])->all();
        return $this->MapData($datas,'AMPHUR_ID','AMPHUR_NAME');
    }
    
    public function actionGetDistrict() {
     $out = [];
     if (isset($_POST['depdrop_parents'])) {
         $ids = $_POST['depdrop_parents'];
         $province_id = empty($ids[0]) ? null : $ids[0];
         $amphur_id = empty($ids[1]) ? null : $ids[1];
         if ($province_id != null) {
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
         $province_id = empty($ids[0]) ? null : $ids[0];
         $amphur_id = empty($ids[1]) ? null : $ids[1];
           $district_id = empty($ids[2]) ? null : $ids[2];
         if ($province_id != null) {
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
