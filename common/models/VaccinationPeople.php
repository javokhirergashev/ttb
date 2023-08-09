<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vaccination_people".
 *
 * @property int $id
 * @property int|null $people_id
 * @property int|null $vaccination_id
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property People $people
 * @property Vaccination $vaccination
 */
class VaccinationPeople extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vaccination_people';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['people_id', 'vaccination_id', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['people_id', 'vaccination_id', 'created_at', 'updated_at'], 'integer'],
            [['people_id'], 'exist', 'skipOnError' => true, 'targetClass' => People::class, 'targetAttribute' => ['people_id' => 'id']],
            [['vaccination_id'], 'exist', 'skipOnError' => true, 'targetClass' => Vaccination::class, 'targetAttribute' => ['vaccination_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'people_id' => 'People ID',
            'vaccination_id' => 'Vaccination ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[People]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasOne(People::class, ['id' => 'people_id']);
    }

    /**
     * Gets query for [[Vaccination]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVaccination()
    {
        return $this->hasOne(Vaccination::class, ['id' => 'vaccination_id']);
    }
}
