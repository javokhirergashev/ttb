<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pregnant;

/**
 * PregnantSearch represents the model behind the search form of `common\models\Pregnant`.
 */
class PregnantSearch extends Pregnant
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'person_id', 'height', 'weight_height_index', 'weight', 'pulse', 'blood_pressure', 'pregnant_week', 'stomach_diameter'], 'integer'],
            [['diagnosis_id', 'description', 'utt_conclusion'], 'safe'],
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
        $query = Pregnant::find();

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
            'id' => $this->id,
            'person_id' => $this->person_id,
            'height' => $this->height,
            'weight_height_index' => $this->weight_height_index,
            'weight' => $this->weight,
            'pulse' => $this->pulse,
            'blood_pressure' => $this->blood_pressure,
            'pregnant_week' => $this->pregnant_week,
            'stomach_diameter' => $this->stomach_diameter,
        ]);

        $query->andFilterWhere(['ilike', 'diagnosis_id', $this->diagnosis_id])
            ->andFilterWhere(['ilike', 'description', $this->description])
            ->andFilterWhere(['ilike', 'utt_conclusion', $this->utt_conclusion]);

        return $dataProvider;
    }
}
