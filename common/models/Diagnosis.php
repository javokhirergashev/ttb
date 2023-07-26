<?php

namespace common\models;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "diagnosis".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string|null $description
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $type
 * @property int|null $status
 *
 * @property User $createdBy
 * @property User $updatedBy
 */
class Diagnosis extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diagnosis';
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
            [['created_at', 'updated_at', 'created_by', 'updated_by', 'type', 'status'], 'default', 'value' => null],
            [['created_at', 'updated_at', 'created_by', 'updated_by', 'type', 'status', 'diagnosis_list_id'], 'integer'],
            [['description', 'complaint', 'anamnez', 'conclusion', 'diagnosis'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
            [['updated_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['updated_by' => 'id']],
            [['diagnosis_list_id'], 'exist', 'skipOnError' => true, 'targetClass' => DiagnosisList::class, 'targetAttribute' => ['diagnosis_list_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Sarlavha',
            'created_at' => 'Yaratilgan vaqti',
            'updated_at' => 'Tahrirlangan vaqti',
            'description' => 'Izoh',
            'created_by' => 'Yaratgan shifokor',
            'updated_by' => 'Tahrirlagan shifokor',
            'type' => 'Turi',
            'status' => 'Status',
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
     * Gets query for [[UpdatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUpdatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    public function getPeople()
    {
        return $this->hasOne(People::class, ['id' => 'people_id']);
    }
}
