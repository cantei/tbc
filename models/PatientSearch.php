<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Patient;

/**
 * PatientSearch represents the model behind the search form about `app\models\Patient`.
 */
class PatientSearch extends Patient
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['DATE_REG', 'TBNUMBER', 'HN', 'FNAME', 'LNAME', 'CID', 'SEX', 'AGE', 'BW', 'HNO', 'ROAD', 'VILLAGE_ID', 'MOO', 'DISTRICT', 'AMPHUR', 'PROVINCE', 'PCU', 'PHONE'], 'safe'],
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
        $query = Patient::find();
//                ->orderBy([
//                    'TBNUMBER'=>SORT_DESC
//                ]);        
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->sort = [ 'defaultOrder' => [ 'ID' => SORT_DESC] ];
//        $dataProvider->sort->attributes['TBNUMBER'] = [
//            // The tables are the ones our relation are configured to
//            // in my case they are prefixed with "tbl_"
//            'asc' => ['patient.TBNUMBER' => SORT_ASC],
//            'desc' => ['patient.TBNUMBER' => SORT_DESC],
//        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'DATE_REG' => $this->DATE_REG,
        ]);

        $query->andFilterWhere(['like', 'TBNUMBER', $this->TBNUMBER])
            ->andFilterWhere(['like', 'HN', $this->HN])
            ->andFilterWhere(['like', 'FNAME', $this->FNAME])
            ->andFilterWhere(['like', 'LNAME', $this->LNAME])
            ->andFilterWhere(['like', 'CID', $this->CID])
            ->andFilterWhere(['like', 'SEX', $this->SEX])
            ->andFilterWhere(['like', 'AGE', $this->AGE])
            ->andFilterWhere(['like', 'BW', $this->BW])
            ->andFilterWhere(['like', 'HNO', $this->HNO])
//            ->andFilterWhere(['like', 'ROAD', $this->ROAD])
            ->andFilterWhere(['like', 'VILLAGE_ID', $this->VILLAGE_ID])
//            ->andFilterWhere(['like', 'MOO', $this->MOO])
            ->andFilterWhere(['like', 'DISTRICT', $this->DISTRICT])
            ->andFilterWhere(['like', 'AMPHUR', $this->AMPHUR])
            ->andFilterWhere(['like', 'PROVINCE', $this->PROVINCE])
//            ->andFilterWhere(['like', 'PCU', $this->PCU])
            ->andFilterWhere(['like', 'PHONE', $this->PHONE]);

        return $dataProvider;
    }
}
