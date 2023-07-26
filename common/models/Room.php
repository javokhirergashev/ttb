<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property int $id
 * @property int|null $section_id
 * @property int|null $bed_count
 * @property int|null $type
 * @property int|null $status
 * @property int|null $clinic_id
 * @property string|null $name
 *
 * @property Clinic $clinic
 * @property Section $section
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['section_id', 'bed_count', 'type', 'status', 'clinic_id'], 'default', 'value' => null],
            [['section_id', 'bed_count', 'type', 'status', 'clinic_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['clinic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clinic::class, 'targetAttribute' => ['clinic_id' => 'id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => Section::class, 'targetAttribute' => ['section_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'section_id' => 'Section ID',
            'bed_count' => 'Bed Count',
            'type' => 'Type',
            'status' => 'Status',
            'clinic_id' => 'Clinic ID',
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[Clinic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClinic()
    {
        return $this->hasOne(Clinic::class, ['id' => 'clinic_id']);
    }

    /**
     * Gets query for [[Section]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Section::class, ['id' => 'section_id']);
    }
}
