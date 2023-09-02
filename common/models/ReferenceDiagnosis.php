<?php

namespace common\models;


use MongoDB\BSON\Timestamp;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "reference_diagnosis".
 *
 * @property int $id
 * @property int|null $reference_id
 * @property string|null $diagnosis
 * @property int|null $position
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 * @property User $createdBy
 * @property Reference $reference
 * @property User $updatedBy
 */
class ReferenceDiagnosis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reference_diagnosis';
    }

    const POSITION_THERAPIST = 1;
    const POSITION_DOCTOR = 2;
    const POSITION_ENDOCRINOLOGIST = 3;
    const POSITION_PSYCHIATRIST = 4;
    const POSITION_OTOLARINGOLOG = 5;
    const POSITION_OFTALMOLOG = 6;
    const POSITION_DENTIST = 7;
    const POSITION_DERMATOLOG = 8;
    const POSITION_NARCOLOG = 9;
    const POSITION_MAIN_DOCTOR = 10;


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
            [['reference_id', 'position', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['position'], 'default', 'value' => self::POSITION_DOCTOR],
            [['reference_id', 'position', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['diagnosis'], 'string', 'max' => 255],
            [['reference_id'], 'exist', 'skipOnError' => true, 'targetClass' => Reference::class, 'targetAttribute' => ['reference_id' => 'id']],
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
            'reference_id' => 'Reference ID',
            'diagnosis' => 'Diagnosis',
            'position' => 'Position',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
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
     * Gets query for [[Reference]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReference()
    {
        return $this->hasOne(Reference::class, ['id' => 'reference_id']);
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

    public static function getPositionList()
    {
        return [
            self::POSITION_THERAPIST => 'Терапевт',
            self::POSITION_DOCTOR => 'Врач',
            self::POSITION_ENDOCRINOLOGIST => 'Эндокринолог',
            self::POSITION_PSYCHIATRIST => 'Психиатр',
            self::POSITION_OTOLARINGOLOG => 'Отоларинголог',
            self::POSITION_OFTALMOLOG => 'Окулист',
            self::POSITION_DENTIST => 'Стоматолог',
            self::POSITION_DERMATOLOG => 'Дерматолог',
            self::POSITION_MAIN_DOCTOR => 'Главный врач',

        ];
    }

    public function getPositionName()
    {
        return self::getPositionList()[$this->position];
    }
}
