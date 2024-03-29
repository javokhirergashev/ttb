<?php

namespace common\models\search;

use common\models\People;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * PeopleSearch represents the model behind the search form of `common\models\People`.
 */
class PeopleSearch extends People
{
    public $full_name;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'region_id', 'district_id', 'quarter_id', 'qvp_id', 'gender'], 'integer'],
            [['first_name', 'last_name', 'middle_name', 'pinfl', 'passport_number', 'phone_number', 'metrka_number', 'territory_code', 'full_name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = People::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            $query->where('0=1');
            return $dataProvider;
        }

        if (\Yii::$app->user->identity->qvp_id) {
            $query->andWhere(['people.qvp_id' => \Yii::$app->user->identity->qvp_id]);
        }


        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $this->status,
            'region_id' => $this->region_id,
            'district_id' => $this->district_id,
            'quarter_id' => $this->quarter_id,
            'qvp_id' => $this->qvp_id,
            'gender' => $this->gender,
        ]);

        $query->andFilterWhere(['ilike', 'first_name', $this->first_name])
            ->andFilterWhere(['ilike', 'last_name', $this->last_name])
            ->andFilterWhere(['ilike', 'middle_name', $this->middle_name])
            ->andFilterWhere(['ilike', 'pinfl', $this->pinfl])
            ->andFilterWhere(['ilike', 'passport_number', $this->passport_number])
            ->andFilterWhere(['ilike', 'phone_number', $this->phone_number])
            ->andFilterWhere(['ilike', 'birthday', $this->birthday])
            ->andFilterWhere(['ilike', 'metrka_number', $this->metrka_number])
            ->andFilterWhere(['ilike', 'territory_code', $this->territory_code]);


        if ($this->full_name) {
            $query->andWhere(['or', ['ilike', 'first_name', $this->full_name], ['ilike', 'last_name', $this->full_name]]);
        }

        return $dataProvider;
    }
}
