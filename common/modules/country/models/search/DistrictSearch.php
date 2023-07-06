<?php

namespace common\modules\country\models\search;

use common\components\Util;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\country\models\District;

/**
 * DistrictSearch represents the model behind the search form of `common\modules\country\models\District`.
 */
class DistrictSearch extends District
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'top'], 'integer'],
            [['name', 'region_id'], 'safe'],
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

        $query = District::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSizeLimit' => [1, 500]
            ]
        ]);

        if (!$this->load($params)) {
            $this->setAttributes($params['filter']);
        }


        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'region_id' => $this->region_id,
            'status' => $this->status,
            'top' => $this->top,
        ]);

        if ($this->name) {

            $this->name = strtolower($this->name);
            $query->andWhere(
                "lower(name::text) ILIKE '%$this->name%'"
            );
        }

        return $dataProvider;
    }
}
