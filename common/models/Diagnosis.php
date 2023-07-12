<?php

namespace common\models;

use Yii;

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

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at', 'created_by', 'updated_by', 'type', 'status'], 'default', 'value' => null],
            [['created_at', 'updated_at', 'created_by', 'updated_by', 'type', 'status'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
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
            'title' => 'Title',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'description' => 'Description',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'type' => 'Type',
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
}
