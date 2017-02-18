<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pat;

/**
 * PatSearch represents the model behind the search form about `app\models\Pat`.
 */
class PatSearch extends Pat
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['REG_DATE', 'TBNUMBER', 'HN', 'FNAME', 'LNAME', 'CID', 'SEX', 'HNO', 'VILLAGE_ID', 'DISTRICT', 'AMPHUR', 'PROVINCE', 'PHONE', 'MEMO'], 'safe'],
            [['AGE', 'BW'], 'integer'],
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
        $query = Pat::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        /*  Set Sort  */
        $dataProvider->sort = [ 'defaultOrder' => [ 'TBNUMBER' => SORT_DESC] ];
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'REG_DATE' => $this->REG_DATE,
            'AGE' => $this->AGE,
            'BW' => $this->BW,
        ]);

        $query->andFilterWhere(['like', 'TBNUMBER', $this->TBNUMBER])
            ->andFilterWhere(['like', 'HN', $this->HN])
            ->andFilterWhere(['like', 'FNAME', $this->FNAME])
            ->andFilterWhere(['like', 'LNAME', $this->LNAME])
            ->andFilterWhere(['like', 'CID', $this->CID])
            ->andFilterWhere(['like', 'SEX', $this->SEX])
            ->andFilterWhere(['like', 'HNO', $this->HNO])
            ->andFilterWhere(['like', 'VILLAGE_ID', $this->VILLAGE_ID])
            ->andFilterWhere(['like', 'DISTRICT', $this->DISTRICT])
            ->andFilterWhere(['like', 'AMPHUR', $this->AMPHUR])
            ->andFilterWhere(['like', 'PROVINCE', $this->PROVINCE])
            ->andFilterWhere(['like', 'PHONE', $this->PHONE])
            ->andFilterWhere(['like', 'MEMO', $this->MEMO]);

        return $dataProvider;
    }
}
