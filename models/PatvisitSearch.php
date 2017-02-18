<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Patvisit;

/**
 * PatvisitSearch represents the model behind the search form about `app\models\Patvisit`.
 */
class PatvisitSearch extends Patvisit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VISIT_ID', 'ADR'], 'integer'],
            [['TBNUMBER', 'VISIT_DATE', 'REF', 'FOOD', 'DAILYDOSE', 'DOTWATCHER', 'PHOTO', 'HOMECARE'], 'safe'],
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
        $query = Patvisit::find();

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
        $query->andFilterWhere([
            'VISIT_ID' => $this->VISIT_ID,
            'VISIT_DATE' => $this->VISIT_DATE,        
            'ADR' => $this->ADR,
        ]);

        $query->andFilterWhere(['like', 'TBNUMBER', $this->TBNUMBER])
            ->andFilterWhere(['like', 'REF', $this->REF])
            ->andFilterWhere(['like', 'FOOD', $this->FOOD])
            ->andFilterWhere(['like', 'DAILYDOSE', $this->DAILYDOSE])
            ->andFilterWhere(['like', 'DOTWATCHER', $this->DOTWATCHER])
            ->andFilterWhere(['like', 'PHOTO', $this->PHOTO])
            ->andFilterWhere(['like', 'HOMECARE', $this->HOMECARE]);

        return $dataProvider;
    }
}
