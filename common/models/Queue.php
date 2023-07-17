<?php

namespace common\models;

use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "queue".
 *
 * @property int $id
 * @property string|null $reason
 * @property int|null $service_id
 * @property int|null $user_id
 * @property int|null $status
 * @property int|null $writing_time
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $phone_number
 * @property int|null $number
 *
 * @property Service $service
 * @property User $user
 */
class Queue extends \yii\db\ActiveRecord
{
    const STATUS_PENDING = 1;
    const STATUS_VIEWED = 2;
    const STATUS_NOT_COME = 3;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'queue';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['service_id', 'user_id', 'writing_time', 'created_at', 'updated_at', 'number'], 'default', 'value' => null],
            [['status'], 'default', 'value' => self::STATUS_PENDING],
            [['service_id', 'user_id', 'status', 'created_at', 'updated_at', 'number', 'people_id'], 'integer'],
            [['reason', 'first_name', 'last_name', 'phone_number', 'passport_number', 'metrka_number'], 'string', 'max' => 255],
            [['writing_time'], 'unique'],
            [['writing_time'], 'safe'],
            [['reason', 'first_name', 'last_name', 'phone_number', 'writing_time'], 'required'],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::class, 'targetAttribute' => ['service_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['people_id'], 'exist', 'skipOnError' => true, 'targetClass' => People::class, 'targetAttribute' => ['people' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reason' => 'Reason',
            'service_id' => 'Service ID',
            'user_id' => 'User ID',
            'status' => 'Status',
            'writing_time' => 'Writing Time',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone_number' => 'Phone Number',
            'number' => 'Number',
        ];
    }

    /**
     * Gets query for [[Service]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Service::class, ['id' => 'service_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getPeople()
    {
        return $this->hasOne(People::class, ['id' => 'people_id']);
    }
}
