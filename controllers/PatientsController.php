<?php

namespace app\controllers;

use Yii;
use yii\base\Model;
use app\models\Patients;
use app\models\PatientsSearch;
use app\models\Diag;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


use app\models\Province;
use app\models\Amphur;
use app\models\District;
use app\models\Areahospname;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\helpers\Html;
use yii\helpers\Url;


/**
 * PatientsController implements the CRUD actions for Patients model.
 */
class PatientsController extends Controller
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
     * Lists all Patients models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PatientsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Patients model.
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
     * Creates a new Patients model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
//    public function actionCreate()
//    {
//        $model = new Patients();
//
//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->ID]);
//        } else {
//            return $this->render('create', [
//                'model' => $model,
//            ]);
//        }
//    }

    
    
    /*  my modi  */
    public function actionCreate()
    {
        $model = new Patients();
        $diag = new Diag();
        $changwat = new Province();
        
        $amphur = ArrayHelper::map($this->getAmphur($changwat->PROVINCE_ID),'id','name');
         \yii\helpers\VarDumper::dump($amphur);
                        exit();

                
//        $district       = ArrayHelper::map($this->getDistrict($model->AMPHUR),'id','name');
        
//        $village       = ArrayHelper::map($this->getVillage($model->DISTRICT),'id','name');
        
        if ($model->load(Yii::$app->request->post()) 
                && $diag->load(Yii::$app->request->post())) {
            $data = Yii::$app->request->post();            
            $model->DATE_REG = date('Y-m-d', strtotime($data['Patients']['DATE_REG']));
            $diag->TB_ID=$model->TBNUMBER;      
            $isValid = $model->validate();
            $isValid = $diag->validate() && $isValid;
            if ($isValid) {
                
                       
                $model->save(false);               
                $diag->save(false);
                 return $this->redirect(['view', 'id' => $model->ID]);
            }
        }        
        return $this->render('create', [
            'model' => $model,
            'diag' => $diag,
            'amphur'=> $amphur,
//            'district' =>$district,
//            'village'=>$village,
        ]);
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    /**
     * Updates an existing Patients model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    /*
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
*/
    public function actionUpdate($id)
    {
        $model = Patients::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException("The user was not found.");
        }        
        $diag = Diag::findOne($model->ID);
//        \yii\helpers\VarDumper::dump($patients);
//        exit();
        if (!$diag) {
            throw new NotFoundHttpException("The user has no profile.");
        }
        
//        $model->scenario = 'update';
//        $diag->scenario = 'update';
//        
        
        if ($model->load(Yii::$app->request->post()) && $diag->load(Yii::$app->request->post())) {
            $data = Yii::$app->request->post();            
            $model->DATE_REG = date('Y-m-d', strtotime($data['Patients']['DATE_REG']));
            $isValid = $model->validate();
            $isValid = $diag->validate() && $isValid;
            if ($isValid) {
                $model->save(false);
                $diag->save(false);
                return $this->redirect(['view', 'id' => $model->ID]);
            }
        }
        
        return $this->render('update', [
            'model' => $model,
            'diag' => $diag,
        ]);

        
    }   
    
    
    
    
    
    
    
    
    
    
    
    /**
     * Deletes an existing Patients model.
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
     * Finds the Patients model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Patients the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Patients::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    /* dependent  dropdown  */
    
    public function actionGetAmphur() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            if ($parents != null) {
                $province_id = $parents[0];
                $out = $this->getAmphur($province_id);
                echo Json::encode(['output' => $out, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    public function actionGetDistrict() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $province_id = empty($ids[0]) ? null : $ids[0];
            $amphur_id = empty($ids[1]) ? null : $ids[1];
            if ($province_id != null) {
                $data = $this->getDistrict($amphur_id);
                echo Json::encode(['output' => $data, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }
    
    /*
    public function actionGetVillage() {
        $out = [];
        if (isset($_POST['depdrop_parents'])) {
            $ids = $_POST['depdrop_parents'];
            $province_id = empty($ids[0]) ? null : $ids[0];
            $amphur_id = empty($ids[1]) ? null : $ids[1];
            $district_id = empty($ids[2]) ? null : $ids[2];
            if ($province_id != null) {
//                $data = $this->getVillage($district_id);
                 $data1 = $this->getVillage($district_id);
                echo Json::encode(['output' => $data1, 'selected' => '']);
                return;
            }
        }
        echo Json::encode(['output' => '', 'selected' => '']);
    }

    */
    
    protected function getAmphur($id) {
        $datas = Amphur::find()->where(['PROVINCE_ID' => $id])->all();
        return $this->MapData($datas, 'AMPHUR_ID', 'AMPHUR_NAME');
    }

    protected function getDistrict($id) {
        $datas = District::find()->where(['AMPHUR_ID' => $id])->all();
        return $this->MapData($datas, 'DISTRICT_ID', 'DISTRICT_NAME');
    }
    /*
    protected function getVillage($id) {
        $datas = \app\models\Areahospname::find()->where(['DISTRICT_ID' =>$id])->all();
        return $this->MapData($datas, 'VILLAGE_ID', 'VILLAGE_NAME');
    }
     
     */
    
    

    protected function MapData($datas, $fieldId, $fieldName) {
        $obj = [];
        foreach ($datas as $key => $value) {
            array_push($obj, ['id' => $value->{$fieldId}, 'name' => $value->{$fieldName}]);
        }
        return $obj;
    }

    
    
    
    
    
}
