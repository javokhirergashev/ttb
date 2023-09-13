<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\WorkingHour;

/**
 * WorkingHourSearch represents the model behind the search form of `common\models\WorkingHour`.
 */
class WorkingHourSearch extends WorkingHour
{

    public $date;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'created_at', 'updated_at', 'type'], 'integer'],
            [['date'], 'safe']
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
        $query = WorkingHour::find();

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
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'type' => $this->type,
        ]);

        if ($this->date) {
            $startTimestamp = strtotime(date('Y-m-d 00:00:00', strtotime($this->date)));
            $endTimestamp = strtotime(date('Y-m-d 23:59:59', strtotime($this->date)));
            $query->andWhere(['between', 'created_at', $startTimestamp, $endTimestamp]);
        }

        $query->orderBy(['created_at' => SORT_DESC]);

        return $dataProvider;
    }
}
