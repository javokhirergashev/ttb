<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "vaccination_people".
 *
 * @property int $id
 * @property int|null $people_id
 * @property int|null $vaccination_class_id
 * @property int|null $vaccination_id
 * @property int|null $period
 * @property int|null $amount
 * @property string|null $seria
 * @property string|null $preparat_name
 * @property string|null $reaction
 * @property string|null $reaction_local
 * @property string|null $reaction_common
 * @property string|null $medical_repulse
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
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['people_id', 'vaccination_id', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['people_id', 'vaccination_id', 'created_at', 'updated_at', 'vaccination_class_id', 'period', 'amount'], 'integer'],
            [['seria', 'preparat_name', 'reaction', 'reaction_local', 'reaction_common', 'medical_repulse'], 'string'],
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
            'people_id' => 'Ismi va Familiyasi',
            'vaccination_class_id' => 'Vaksina sinfi',
            'vaccination_id' => 'Vaksina nomi',
            'amount' => 'Miqdori',
            'period' => 'Muddati',
            'seria' => 'Seriyasi',
            'preparat_name' => 'Preparat nomi',
            'reaction' => 'Emlashga rekasiyalar',
            'reaction_local' => 'Mahalliy',
            'reaction_common' => 'Umumiy',
            'medical_repulse'  => 'Tibbiyot qarshiligi',
            'created_at' => 'Yaratilgan vaqti',
            'updated_at' => 'Tahrirlangan muddati',
        ];
    }

    /**
     * Gets query for [[People]].
     *
     * @return \yii\db\ActiveQuery
     */
    /**
     * Gets query for [[Vaccination]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVaccination()
    {
        return $this->hasOne(Vaccination::class, ['id' => 'vaccination_id']);
    }
    public function getVacclass()
    {
        return $this->hasOne(VaccinationClass::class, ['id' => 'vaccination_class_id']);
    }
    public function getPerson()
    {
        return $this->hasOne(People::class, ['id' => 'people_id']);
    }
}
