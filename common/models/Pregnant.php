<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pregnant".
 *
 * @property int $id
 * @property int|null $person_id
 * @property string|null $diagnosis_id
 * @property string|null $description
 * @property int|null $height
 * @property int|null $weight_height_index
 * @property int|null $weight
 * @property int|null $pulse
 * @property int|null $blood_pressure
 * @property int|null $pregnant_week
 * @property string|null $utt_conclusion
 * @property int|null $stomach_diameter
 *
 * @property People $person
 */
class Pregnant extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pregnant';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_id', 'height', 'weight_height_index', 'weight', 'pulse', 'blood_pressure', 'pregnant_week', 'stomach_diameter'], 'default', 'value' => null],
            [['person_id', 'height', 'weight_height_index', 'weight', 'pulse', 'blood_pressure', 'pregnant_week', 'stomach_diameter'], 'integer'],
            [['utt_conclusion'], 'string'],
            [['diagnosis_id', 'description'], 'string', 'max' => 255],
            [['person_id'], 'exist', 'skipOnError' => true, 'targetClass' => People::class, 'targetAttribute' => ['person_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'person_id' => 'Ismi va familiyasi',
            'diagnosis_id' => 'Tashxis',
            'description' => 'Umumiy xulosa',
            'height' => 'Bo\'yi',
            'weight' => 'Vazni',
            'weight_height_index' => 'Bo\'y-vazn indeksi',
            'pulse' => 'Pulsi',
            'blood_pressure' => 'Qon bosimi',
            'pregnant_week' => 'Homiladorlik haftasi',
            'utt_conclusion' => 'UZI xulosasi',
            'stomach_diameter' => 'Qorin diametri',
        ];
    }

    /**
     * Gets query for [[Person]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPerson()
    {
        return $this->hasOne(People::class, ['id' => 'person_id']);
    }
}
