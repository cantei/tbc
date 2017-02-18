<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ddl;

/**
 * DdlSearch represents the model behind the search form about `app\models\Ddl`.
 */
class DdlSearch extends Ddl
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TBNUMBER'], 'integer'],
            [['VILLAGE_ID', 'MOO', 'DISTRICT', 'AMPHUR', 'PROVINCE', 'PCU', 'PHONE'], 'safe'],
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
        $query = Ddl::find();

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
            'TBNUMBER' => $this->TBNUMBER,
        ]);

        $query->andFilterWhere(['like', 'VILLAGE_ID', $this->VILLAGE_ID])
            ->andFilterWhere(['like', 'MOO', $this->MOO])
            ->andFilterWhere(['like', 'DISTRICT', $this->DISTRICT])
            ->andFilterWhere(['like', 'AMPHUR', $this->AMPHUR])
            ->andFilterWhere(['like', 'PROVINCE', $this->PROVINCE])
            ->andFilterWhere(['like', 'PCU', $this->PCU])
            ->andFilterWhere(['like', 'PHONE', $this->PHONE]);

        return $dataProvider;
    }
}
