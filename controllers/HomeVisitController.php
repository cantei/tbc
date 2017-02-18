<?php

namespace app\controllers;

use Yii;
use app\models\Homevisit;
use app\models\HomevisitSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Patient;
use yii\data\ActiveDataProvider;

/**
 * HomeVisitController implements the CRUD actions for Homevisit model.
 */
class HomeVisitController extends Controller
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
                    'delete' => ['POST','GET'],
                    //'create' => ['get', 'post']
                ],
            ],
        ];
    }

    /**
     * Lists all Homevisit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new HomevisitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Homevisit model.
     * @param string $id
     * @return mixed
     */
     public function actionView($id)
    {

        $rows = Homevisit::find()->where(['ID'=>$id])->all();
        
        
            if(!empty($rows))
            {
              foreach($rows as $row)
              {
                $last_id = $row->ID;
            //    $lon = $row->lon;
              }
            }
        
        $model = Homevisit::find()->where(['ID'=>$id])->all();
//        echo $last_id;die;
//        \yii\helpers\VarDumper::dump($model,10,true);die;
        
        return $this->render('view', [
            'model' => $model,
            'id'=>$id,
            'row'=>$row,
//             'details'=>$details
          
    ]);
    }
    public function actionList($tbnumber)            
    {
        
        $tbnumber=Yii::$app->request->get('tbnumber');
        /*
        $states=1;
        $model = Homevisit::find()
                ->groupBy(`TB_ID`, `VISITDATE`)
                ->having(['TB_ID'=>$tbnumber])
//                ->addParams([':TB_ID'=>$tbnumber])
                ->all();
          if(!empty($model)){
              
//              $data = $model->load(Yii::$app->request->post());
             // \yii\helpers\VarDumper::dump($model,10,true);die;
              $x=$model->Homevisit->TB_ID;
              echo $x;
          }
         * 
         */
//        echo $model->TB_ID;
//        die;
//         \yii\helpers\VarDumper::dump($model,10,true);
//            exit();
        
//        $model = Homevisit::find()->where(['TB_ID' =>$tbnumber])->all();
//        \yii\helpers\VarDumper::dump($model,10,true);  exit();
        /*

         \yii\helpers\VarDumper::dump($model,10,true);
            exit();
        $leadsCount = Homevisit::find()
                    ->select(['COUNT(*) AS cnt'])
                    ->where(['TB_ID' =>$tbnumber])
                    ->groupBy(['TB_ID', 'VISITDATE'])
                    ->all();
            \yii\helpers\VarDumper::dump($leadsCount,10,true);
            exit();
          */  
        $query = Homevisit::find()->where(['TB_ID'=>$tbnumber]);
//        \yii\helpers\VarDumper::dump($query,10,true);die;
       
        
        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
//            'query'=> Homevisit::find()->groupBy(`TB_ID`, `VISITDATE`)->having(['TB_ID'=>$tbnumber])->addParams([':TB_ID'=>$tbnumber])             ->all(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        
        $rows=Homevisit::find()->where(['TB_ID'=>$tbnumber])->one();
        
//        \yii\helpers\VarDumper::dump($rows,10,true);  exit();
        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'tbnumber'=>$tbnumber,
//            'id'=>2052,
        ]);
    }

    /**
     * Creates a new Homevisit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($tbnumber)
    {
//         if (\Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//        echo $tbnumber;
//        exit();
        /*
        $model = new Homevisit();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }        
         */
                
//         if(!empty($patient)){
//                $data = Yii::$app->request->post();
//                \yii\helpers\VarDumper::dump($patient,10,true);die();
//                echo $patient->attributes();exit();
                //$model->DATE_REG = date('Y-m-d', strtotime($data['Patient']['DATE_REG']));
//         }
//        echo $patient['TBNUMBER'];die;
//        $model = new Homevisit();
//        $model = Homevisit::find()->where(['TB_ID' =>$patient->TBNUMBER])->one();
        

        $tbnumber=Yii::$app->request->get('tbnumber');
//        $patient = Patient::find()->where(['TBNUMBER'=>$tbnumber])->all();
        $patient = Patient::find()->where(['TBNUMBER'=>$tbnumber])->one();
//          \yii\helpers\VarDumper::dump($patient,10,true);die();
        $model = new Homevisit();      
//        $patient->TBNUMBER;die();
        if($model->load(Yii::$app->request->post())){
            $model->TB_ID=$patient->TBNUMBER;
           // echo 'this is new model'.$model->TB_ID;die;
            $model->save();
            
           $last = Homevisit::find()->where(['TB_ID' =>$model->TB_ID])
                   ->orderBy(['ID' =>SORT_DESC])->limit(1)->one();
           $id=$last->ID;
//            echo $last->ID;die;
//            \yii\helpers\VarDumper::dump($last,10,true);die;
//            $id=$model->TB_ID;
            return $this->redirect(['view', 'id' =>$id]);            
        }
        return $this->render('create', [
                'model' => $model,
                'patient'=>$patient,
                'tbnumber'=>$tbnumber               
            ]);
        
        
        
        
        
        
        
        
        
        
        
        
        
    }

    /**
     * Updates an existing Homevisit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
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

    /**
     * Deletes an existing Homevisit model.
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
     * Finds the Homevisit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Homevisit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Homevisit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
