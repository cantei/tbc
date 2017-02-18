<?php

namespace app\controllers;

use Yii;
use app\models\Tbpt;
use app\models\TbptSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Tbcat;

/**
 * TbptController implements the CRUD actions for Tbpt model.
 */
class TbptController extends Controller
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
     * Lists all Tbpt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TbptSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tbpt model.
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
     * Creates a new Tbpt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tbpt();
        $cat = new Tbcat();

        if ($model->load(Yii::$app->request->post()) && $cat->load(Yii::$app->request->post()) && $model->validate()) {
            $model->save(false); // skip validation as model is already validated
        
//            \yii\helpers\VarDumper::dump($cat);
//            exit();
            $cat->TBNUMBER = $model->TBNUMBER; // no need for validation rule on user_id as you set it yourself
//        
//        
//        $cat->DRUGCAT = Yii::$app->request->post('DRUGCAT');
//        $cat->DATESTART = Yii::$app->request->post('DATESTART');
        $cat->save(); 

            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'cat'=>$cat
            ]);
        }
    }
    
    /**
     * Updates an existing Tbpt model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

//        $cat = Tbcat::find()->where(['ID' =>$id])->all();
        $cat = Tbcat::find()->where(['ID' =>$model->ID])->one();
//        $data = Yii::$app->request->post();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'cat'=>$cat
                
            ]);
        }    
    }

    /**
     * Deletes an existing Tbpt model.
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
     * Finds the Tbpt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tbpt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tbpt::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
