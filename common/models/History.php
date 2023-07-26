<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "history".
 *
 * @property int $id
 * @property int|null $from_doctor_id
 * @property int|null $to_doctor_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string|null $reason
 *
 * @property User $fromDoctor
 * @property User $toDoctor
 */
class History extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'history';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['from_doctor_id', 'to_doctor_id', 'queue_id', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['from_doctor_id', 'to_doctor_id', 'created_at', 'updated_at'], 'integer'],
            [['reason'], 'string', 'max' => 255],
            [['from_doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['from_doctor_id' => 'id']],
            [['to_doctor_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['to_doctor_id' => 'id']],
            [['queue_id'], 'exist', 'skipOnError' => true, 'targetClass' => Queue::class, 'targetAttribute' => ['queue_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'from_doctor_id' => 'From Doctor ID',
            'to_doctor_id' => 'To Doctor ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'reason' => 'Reason',
        ];
    }

    /**
     * Gets query for [[FromDoctor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFromDoctor()
    {
        return $this->hasOne(User::class, ['id' => 'from_doctor_id']);
    }

    /**
     * Gets query for [[ToDoctor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getToDoctor()
    {
        return $this->hasOne(User::class, ['id' => 'to_doctor_id']);
    }
}
