<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Patients;

/**
 * PatientsSearch represents the model behind the search form about `app\models\Patients`.
 */
class PatientsSearch extends Patients
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'integer'],
            [['DATE_REG', 'TBNUMBER', 'HN', 'FNAME', 'LNAME', 'DISTRICT', 'DISTRICT_ID', 'AMPHUR_ID', 'AMPHUR', 'PROVINCE_ID', 'PROVINCE', 'PHONE'], 'safe'],
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
        $query = Patients::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
//        $dataProvider->setSort([
//               'attributes' => [
//                   'DATE_REG',
//                   'TBNUMBER' => [
//                       'asc' => ['TBNUMBER' => SORT_ASC],
//                       'desc' => ['TBNUMBER' => SORT_DESC],
//                       'label' => 'TBNUMBER',
//                       'default' => SORT_DESC
//                   ],
////                   'country_id'
//               ]
//           ]);
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
            ->andFilterWhere(['like', 'DISTRICT', $this->DISTRICT])
            ->andFilterWhere(['like', 'DISTRICT_ID', $this->DISTRICT_ID])
            ->andFilterWhere(['like', 'AMPHUR_ID', $this->AMPHUR_ID])
            ->andFilterWhere(['like', 'AMPHUR', $this->AMPHUR])
            ->andFilterWhere(['like', 'PROVINCE_ID', $this->PROVINCE_ID])
            ->andFilterWhere(['like', 'PROVINCE', $this->PROVINCE])
            ->andFilterWhere(['like', 'PHONE', $this->PHONE]);

        return $dataProvider;
    }
}
