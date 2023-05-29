<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Queue;

/**
 * QueueSearch represents the model behind the search form of `common\models\Queue`.
 */
class QueueSearch extends Queue
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'service_id', 'user_id', 'status', 'writing_time', 'created_at', 'updated_at', 'number'], 'integer'],
            [['reason', 'first_name', 'last_name', 'phone_number'], 'safe'],
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
        $query = Queue::find();

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
            'service_id' => $this->service_id,
            'user_id' => $this->user_id,
            'status' => $this->status,
            'writing_time' => $this->writing_time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'number' => $this->number,
        ]);

        $query->andFilterWhere(['ilike', 'reason', $this->reason])
            ->andFilterWhere(['ilike', 'first_name', $this->first_name])
            ->andFilterWhere(['ilike', 'last_name', $this->last_name])
            ->andFilterWhere(['ilike', 'phone_number', $this->phone_number]);

        return $dataProvider;
    }
}
