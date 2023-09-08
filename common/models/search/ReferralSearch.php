<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Referral;

/**
 * ReferralSearch represents the model behind the search form of `common\models\Referral`.
 */
class ReferralSearch extends Referral
{
    public $first_name;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'clinic_id', 'type', 'people_id', 'diagnosis_list_id', 'section_id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'status'], 'integer'],
            [['reason', 'first_name'], 'safe'],
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
        $query = Referral::find();

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
            'referral.id' => $this->id,
            'referral.clinic_id' => $this->clinic_id,
            'referral.type' => $this->type,
            'referral.people_id' => $this->people_id,
            'referral.diagnosis_list_id' => $this->diagnosis_list_id,
            'referral.section_id' => $this->section_id,
            'referral.created_at' => $this->created_at,
            'referral.updated_at' => $this->updated_at,
            'referral.created_by' => $this->created_by,
            'referral.updated_by' => $this->updated_by,
            'referral.status' => $this->status,
        ]);

        $query->andFilterWhere(['ilike', 'reason', $this->reason]);

        $query->orderBy(['referral.status' => SORT_ASC]);

        if ($this->first_name) {
            $query->leftJoin('people', 'referral.people_id=people.id')
                ->andWhere(['or', ['ilike', 'people.first_name', $this->first_name], ['ilike', 'last_name', $this->first_name]]);
        }

        return $dataProvider;
    }
}
