<?php

namespace common\models\search;

use common\models\User;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\UserCreateForm;

/**
 * UserCreateSearch represents the model behind the search form of `common\models\UserCreateForm`.
 */
class UserSearch extends User
{

    public $full_name;
    public $date;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'type', 'role', 'created_at', 'updated_at', 'deleted_at', 'avatar_id', 'status', 'position_id'], 'integer'],
            [['phone_number', 'first_name', 'last_name', 'email', 'username', 'auth_key', 'password_hash', 'verification_token', 'date', 'full_name'], 'safe'],
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
        $query = User::find();

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
            'status' => $this->status,
            'position_id' => $this->position_id,
        ]);

        if (!$this->date){
            $this->date = date('Y-m-d');
        }

//        $query->andWhere(['qvp_id' => \Yii::$app->user->identity->qvp->id]);

        $query->andFilterWhere(['like', 'phone_number', $this->phone_number])
            ->andFilterWhere(['like', 'first_name', $this->first_name])
            ->andFilterWhere(['like', 'last_name', $this->last_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'username', $this->username]);

        $query->andWhere(['<>', 'id', User::ADMIN_ID]);

        return $dataProvider;
    }
}
