<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Outcomes;

/**
 * OutcomesSearch represents the model behind the search form about `app\models\Outcomes`.
 */
class OutcomesSearch extends Outcomes
{
    public $fname;
    public $lname;
    public $outcomes;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['TBNUMBER', 'OUTCOME_ID', 'OUTCOME_DATE','fname','lname','outcomes'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Outcomes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
//        $query->joinWith('patient','outcometype');
       
        /*
        $query->joinWith(['patient'])
                ->select(['patient.TBNUMBER','COUNT(patient.TBNUMBER) as cnt'])
                ->groupBy('patient.TBNUMBER')
//              ->orderBy(['cnt' => 'DESC'])
                ->all();
        */
        $query->joinwith('patient')->joinWith('outcometype')->all();
        $query->andFilterWhere([
            'ID' => $this->ID,
            'OUTCOME_DATE' => $this->OUTCOME_DATE,
        ]);

        $query->andFilterWhere(['like', 'TBNUMBER', $this->TBNUMBER])
                ->andFilterWhere(['like','patient.FNAME', $this->fname])
                ->andFilterWhere(['like','patient.LNAME', $this->lname])
                 ->andFilterWhere(['like','outcometype.OUTCOME_NAME', $this->outcomes])
            ->andFilterWhere(['like', 'OUTCOME_ID', $this->OUTCOME_ID]);

        return $dataProvider;
    }
}
