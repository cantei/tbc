<?php

namespace app\controllers;

use Yii;
use app\models\Patient;
use app\models\PatientSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Drugcat;
use app\models\Illness;

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
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Patient model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {   
        $model = new Patient;
        $drugcat = new Drugcat;

  
        if ($model->load(Yii::$app->request->post())) {

            $model->save(false); // skip validation as model is already validated
            
            
            $drugcat->TBNUMBER = $model->TBNUMBER; // no need for validation rule on user_id as you set it yourself
            $drugcat->save(false); 
//            \yii\helpers\VarDumper::dump($model,10,true);
            
      \yii\helpers\VarDumper::dump($drugcat,10,true);
        exit();
        
            return $this->redirect(['view', 'id' => $model->TBNUMBER]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'drugcat' => $drugcat,
            ]);
        }
    }
    /*
    public function actionCreate()
    {
        $model = new Patient();
        $drugcat= new Drugcat();

        if ($model->load(Yii::$app->request->post()) ) {
//            $drugcat = Drugcat::find()->where(['TBNUMBER' =>$model->TBNUMBER])->one();
            
//              \yii\helpers\VarDumper::dump($drugcat,10,true);
//                exit();
//            $illness = Illness::find()->where(['TBNUMBER' =>$model->TBNUMBER])->one();
//            
            $data = Yii::$app->request->post();            
            $model->DATE_REG = date('Y-m-d', strtotime($data['Patient']['DATE_REG']));
            $drugcat->DATE_CAT = date('Y-m-d', strtotime($data['Patient']['DATE_CAT']));
            $drugcat->TBNUMBER=$model->TBNUMBER;
            $model->save();
            $drugcat->save();
            return $this->redirect(['view', 'id' => $model->TBNUMBER,'drugcat'=>$drugcat]);
        } else {
//            $drugcat=null;
//            $illness=null;
            return $this->render('create', [
                'model' => $model,
//                'drugcat'=>$drugcat,
//                'illness'=>$illness,
            ]);
        }
    } // create 
    */

    /**
     * Updates an existing Patient model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            
//              $data = Yii::$app->request->post();
             
            $drugcat = Drugcat::find()->where(['TBNUMBER' =>$model->TBNUMBER])->one();
//              \yii\helpers\VarDumper::dump($drugcat,10,true);
            
//            $tbnumber=$model->TBNUMBER;
//            echo $tbnumber;
//            exit();
            
//            $illness = Illness::find()->where(['TBNUMBER' =>$model->TBNUMBER])->one();
//            $data = Yii::$app->request->post();

//                \yii\helpers\VarDumper::dump($data,10,true);
//                exit();
                $data = Yii::$app->request->post();
                $model->DATE_REG = date('Y-m-d', strtotime($data['']['DATE_REG']));
            
            
//            \yii\helpers\VarDumper::dump($model,10,true);
            
            
            $model->save();
            return $this->redirect(['view', 'id' => $model->TBNUMBER,'drugcat'=>$drugcat]);
        } else {
//            $drugcat=null;
//            $illness=null;
//            $model->DATE_REG = date('Y-m-d');
             $drugcat = Drugcat::find()->where(['TBNUMBER' =>$model->TBNUMBER])->one();
            return $this->render('update', [
                'model' => $model,
               'drugcat'=>$drugcat
//                'illness'=>$illness
            ]);
        }
    }

    /**
     * Deletes an existing Patient model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
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
     * @param string $id
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
         $amphur_id = empty($ids[0]) ? null : $ids[0];
//         $amphur_id = empty($ids[1]) ? null : $ids[1];
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











