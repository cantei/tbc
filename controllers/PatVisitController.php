<?php

namespace app\controllers;

use Yii;
use app\models\Pat;
use app\models\Patvisit;
use app\models\PatvisitSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
/**
 * PatVisitController implements the CRUD actions for Patvisit model.
 */
class PatVisitController extends Controller
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
//                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Patvisit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new \app\models\PatSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionList($tbnumber)            
    {        
        $query = Patvisit::find()->where(['TBNUMBER'=>$tbnumber])
//                ->andWhere('REF');
         ->andWhere(['not', ['REF' => null]]);
        $dataProvider = new ActiveDataProvider([
            'query'=>$query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        
        $rows=Patvisit::find()->where(['TBNUMBER'=>$tbnumber])->one();
        return $this->render('list', [
            'dataProvider' => $dataProvider,
            'tbnumber'=>$tbnumber,
        ]);
    }
    
    public function actionCreate($tbnumber)
    {
        $patient = Pat::find()->where(['TBNUMBER'=>$tbnumber])->one();
        $model = new Patvisit();      
        if($model->load(Yii::$app->request->post()) ){
            $model->TBNUMBER=$patient->TBNUMBER;         
            $model->REF=md5($model->TBNUMBER.$model->VISIT_DATE);
                if($model->validate()){
                $model->save();           
                $last = Patvisit::find()->where(['TBNUMBER' =>$model->TBNUMBER])
                       ->orderBy(['VISIT_ID' =>SORT_DESC])->limit(1)->one();
                $id=$last->VISIT_ID;
           return $this->redirect(['view', 'id' =>$id,'tbnumber'=>$tbnumber]);            
            }
        }
        return $this->render('create', [
            'model' => $model,
            'patient'=>$patient,
            'tbnumber'=>$tbnumber               
        ]);
        
        
        
    }
    /**
     * Displays a single Patvisit model.
     * @param integer $id
     * @return mixed
     */
    
    public function actionView($id,$tbnumber)
    {
        
        return $this->render('view', [
            'model' => $this->findModel($id),
            'tbnumber'=>$tbnumber,
        ]);
    }



    /**
     * Updates an existing Patvisit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {
            $data = Yii::$app->request->post();
//                        \yii\helpers\VarDumper::dump($model,10,true);die;
            $model->VISIT_DATE = date('Y-m-d', strtotime($data['Patvisit']['VISIT_DATE']));    
            $model->save();
            $last = Patvisit::find()->where(['TBNUMBER' =>$model->TBNUMBER])
                    ->orderBy(['VISIT_ID' =>SORT_DESC])->limit(1)->one();
            $id=$last->VISIT_ID;
           return $this->redirect(['view', 'id' =>$id,'tbnumber'=>$model->TBNUMBER]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Patvisit model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id,$tbnumber)
    {
//        $model= Patvisit::findOne($id);
//        $count = count ( $model );
        $count = Patvisit::find()
            ->where(['TBNUMBER' => $tbnumber])
            ->count();
        // echo $count;die;
        if($count>1) {
            $model= Patvisit::findOne($id);
            if($model->delete()){
                Yii::$app->session->setFlash('success', "Your message to display");
                return $this->redirect(['list','tbnumber'=>$tbnumber]);
            }
        }  else {
             Yii::$app->session->setFlash('error', "คุณไม่สามารถทำอะไรได้");
              return $this->redirect(['list','tbnumber'=>$tbnumber]);
        }
        
        
    }

    /**
     * Finds the Patvisit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Patvisit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Patvisit::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
