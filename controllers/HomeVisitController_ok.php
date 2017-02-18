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
                    'delete' => ['POST'],
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

        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
//            'query'=> Homevisit::find()->groupBy(`TB_ID`, `VISITDATE`)->having(['TB_ID'=>$tbnumber])->addParams([':TB_ID'=>$tbnumber])             ->all(),
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
//        \yii\helpers\VarDumper::dump($dataProvider,10,true);  exit();
        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'tbnumber'=>$tbnumber,
        ]);
    }

    /**
     * Creates a new Homevisit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($tbnumber)
    {
        echo $tbnumber;
        exit();
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
