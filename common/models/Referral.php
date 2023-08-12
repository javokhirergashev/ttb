<?php

namespace common\models;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "referral".
 *
 * @property int $id
 * @property int|null $clinic_id
 * @property int|null $type
 * @property string|null $reason
 * @property int|null $people_id
 * @property int|null $diagnosis_list_id
 * @property int|null $section_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $status
 *
 * @property Clinic $clinic
 * @property User $createdBy
 * @property DiagnosisList $diagnosisList
 * @property People $people
 * @property Section $section
 * @property User $updatedBy
 */
class Referral extends \yii\db\ActiveRecord
{
    const OPERATION = 1;
    const STATSIONAR = 2;

    const STATUS_PENDING = 1;
    const STATUS_CANCELLED = 2;
    const STATUS_ACCEPTED = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'referral';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clinic_id', 'type', 'people_id', 'diagnosis_list_id', 'section_id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'status'], 'default', 'value' => null],
            [['clinic_id', 'type', 'people_id', 'diagnosis_list_id', 'section_id', 'created_at', 'updated_at', 'created_by', 'updated_by', 'status', 'day_count'], 'integer'],
            [['reason', 'comment'], 'string', 'max' => 255],
            [['day_count', 'people_id', 'clinic_id', 'section_id'], 'required'],
            [['clinic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clinic::class, 'targetAttribute' => ['clinic_id' => 'id']],
            [['diagnosis_list_id'], 'exist', 'skipOnError' => true, 'targetClass' => DiagnosisList::class, 'targetAttribute' => ['diagnosis_list_id' => 'id']],
            [['people_id'], 'exist', 'skipOnError' => true, 'targetClass' => People::class, 'targetAttribute' => ['people_id' => 'id']],
            [['section_id'], 'exist', 'skipOnError' => true, 'targetClass' => Section::class, 'targetAttribute' => ['section_id' => 'id']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'clinic_id' => 'Clinic ID',
            'type' => 'Type',
            'reason' => 'Reason',
            'people_id' => 'People ID',
            'diagnosis_list_id' => 'Diagnosis List ID',
            'section_id' => 'Section ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'status' => 'Status',
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
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[DiagnosisList]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDiagnosisList()
    {
        return $this->hasOne(DiagnosisList::class, ['id' => 'diagnosis_list_id']);
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
     * Gets query for [[Section]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSection()
    {
        return $this->hasOne(Section::class, ['id' => 'section_id']);
    }

    /**
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    public static function getTypeList()
    {
        return [
            self::OPERATION => 'Jarrohlik amaliyoti',
            self::STATSIONAR => 'Statsionar davolanish'
        ];
    }

    public function getStatusName()
    {
        if ($this->status == self::STATUS_CANCELLED) {
            return '<span class="badge badge-danger">Bekor qilindi</span>';
        } elseif ($this->status == self::STATUS_PENDING) {
            return '<span class="badge badge-info">Kutilmoqda</span>';
        }
        return '<span class="badge badge-success">Tasdiqlandi</span>';
    }
}
