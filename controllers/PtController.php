<?php

namespace app\controllers;

use Yii;
use app\models\Pt;
use app\models\PtSearch;
use app\models\RegistForm;
use app\models\Diag;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PtController implements the CRUD actions for Pt model.
 */
class PtController extends Controller
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
     * Lists all Pt models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PtSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pt model.
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
     * Creates a new Pt model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
 /**
     * Creates a new MEmp model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {

        $model = new Pt();
        $modelDiag = new Diag();

        if($model->load(Yii::$app->request->post()) &&
           $modelDiag->load(Yii::$app->request->post()) 
//                &&            Model::validateMultiple([$model,$modelDiag])
                )
        {
          $transaction = $modelDiag::getDb()->beginTransaction();
          try {
            if($modelDiag->save()){
              $model->TBNUMBER = $modelDiag->TB_ID;
              $model->save();
            }
             $transaction->commit();
          } catch (\Exception $e) {
             $transaction->rollBack();
          }
            return $this->redirect(['view', 'ID' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'modelDiag'=>$modelDiag
            ]);
        }
    }

    /**
     * Updates an existing Pt model.
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
                'regist'=>$regist,
            ]);
        }
    }

    /**
     * Deletes an existing Pt model.
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
     * Finds the Pt model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Pt the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pt::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
