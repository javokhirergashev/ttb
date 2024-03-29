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
    const STATUS_REDIRECT = 4;


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
            [['service_id', 'qvp_id', 'user_id', 'writing_time', 'created_at', 'updated_at', 'number'], 'default', 'value' => null],
            [['status'], 'default', 'value' => self::STATUS_PENDING],
            [['service_id', 'user_id', 'status', 'created_at', 'updated_at', 'number', 'people_id'], 'integer'],
            [['reason', 'first_name', 'last_name', 'phone_number', 'passport_number', 'metrka_number'], 'string', 'max' => 255],
            [['writing_time'], 'unique'],
            [['writing_time'], 'safe'],
            [['reason', 'first_name', 'last_name', 'phone_number', 'writing_time'], 'required'],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Service::class, 'targetAttribute' => ['service_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['people_id'], 'exist', 'skipOnError' => true, 'targetClass' => People::class, 'targetAttribute' => ['people_id' => 'id']],
            [['qvp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Qvp::class, 'targetAttribute' => ['qvp_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'reason' => 'Murojaat ',
            'service_id' => 'Xizmat nomi',
            'user_id' => 'Shifokor',
            'status' => 'Status',
            'writing_time' => 'Yozilgan vaqti',
            'created_at' => 'Yaratilgan vaqti',
            'updated_at' => 'Tahrirlangan vaqti',
            'first_name' => 'Ismi',
            'last_name' => 'Familiyasi',
            'phone_number' => 'Telefon raqami',
            'number' => 'Raqami',
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

    public function getQvp()
    {
        return $this->hasOne(Qvp::class, ['id' => 'qvp_id']);
    }

    public function getPeople()
    {
        return $this->hasOne(People::class, ['id' => 'people_id']);
    }
}
