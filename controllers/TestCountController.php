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
class TestCountController extends Controller
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
/*
        $query = Patient::find();
  
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'defaultOrder' => [
                    'ID' => SORT_DESC,
//                    'title' => SORT_ASC, 
                ]
            ],
        ]);
        
*
 */
$searchModel = new \app\models\PatientSearch();
$dataProvider = $searchModel->search(Yii::$app->request->queryParams);


//    $query->andFilterWhere(['<>', 'role'=>'regular']);
    return $this->render('index', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
//        $query = Patient::find()
//                 ->joinWith(['homevisit'])
//                ->select(['patient.TBNUMBER','COUNT(*) AS cnt'])
////                ->where('approved = 1')
//                ->groupBy(['TBNUMBER'])
//                ->all();
//        $dataProvider = new ActiveDataProvider([
//            'query' => $query,
//            'pagination' => [
//                'pageSize' => 10,
//            ],
//            'sort' => [
//                'defaultOrder' => [
//                    'created_at' => SORT_DESC,
//                    'title' => SORT_ASC, 
//                ]
//            ],
//        ]);
        
//        \yii\helpers\VarDumper::dump($model,10,true);die;
        
//        return $this->render('index', [
//         
//            'dataProvider' => $dataProvider,
////            'query'=>$query
//        ]);
    }

}   