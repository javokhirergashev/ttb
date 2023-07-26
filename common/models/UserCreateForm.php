<?php

namespace common\models;

use common\behaviors\ConvertBehaviors;
use common\behaviors\DateTimeBehavior;
use common\modules\country\models\District;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $phone_number
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $username
 * @property int|null $type
 * @property int|null $role
 * @property string $auth_key
 * @property string|null $password_hash
 * @property int $created_at
 * @property int $updated_at
 * @property int|null $deleted_at
 * @property int|null $avatar
 * @property int $status
 * @property string|null $verification_token
 * @property string|null $telegram_link
 * @property string|null $instagram_link
 * @property string|null $facebook_link
 * @property string|null $twitter_link
 * @property int|null $position_id
 * @property int|null $district_id
 *
 * @property Position $position
 * @property Queue[] $queues
 * @property Service[] $services
 * @property Service[] $services0
 */
class UserCreateForm extends \yii\db\ActiveRecord
{
    public $password;
    const STATUS_INACTIVE = 2;
    const STATUS_ACTIVE = 1;
    const ROLE_ADMIN = 1;
    const ROLE_MANAGER = 2;
    const ROLE_STATIST = 3;
    const ROLE_DOCTOR = 4;
    const ROLE_NURSE = 5;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
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
            [['password'], 'safe'],
            [['type', 'role', 'created_at', 'updated_at', 'deleted_at', 'status', 'district_id', 'position_id'], 'integer'],
            [['phone_number', 'first_name', 'last_name', 'email', 'username', 'password_hash', 'verification_token'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['position_id'], 'exist', 'skipOnError' => true, 'targetClass' => Position::class, 'targetAttribute' => ['position_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone_number' => 'Telefon raqami',
            'first_name' => 'Ismi',
            'last_name' => 'Familiyasi',
            'email' => 'Email',
            'username' => 'Login',
            'type' => 'Turi',
            'role' => 'Rol',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'created_at' => 'Yaratilgan vaqti',
            'updated_at' => 'Tahrirlangan vaqti',
            'deleted_at' => 'O\'chirilgan vaqti',
            'avatar' => 'Avatar',
            'status' => 'Status',
            'verification_token' => 'Verification Token',
            'position_id' => 'Lavozimi',
            'district_id' => 'Tuman',
            'telegram_link' => 'Telegram',
            'facebook_link' => 'Facebook',
            'instagram_link' => 'Instagram',
            'twitter_link' => 'Twitter',
        ];
    }

    /**
     * Gets query for [[Position]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPosition()
    {
        return $this->hasOne(Position::class, ['id' => 'position_id']);
    }

    /**
     * Gets query for [[Queues]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQueues()
    {
        return $this->hasMany(Queue::class, ['user_id' => 'id']);
    }

    /**
     * Gets query for [[Services]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Service::class, ['created_by' => 'id']);
    }

    /**
     * Gets query for [[Services0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServices0()
    {
        return $this->hasMany(Service::class, ['updated_by' => 'id']);
    }
    public function getDistrict()
    {
        return $this->hasOne(District::class, ['id' => 'district_id']);
    }
    public function getQvp()
    {
        return $this->hasOne(Qvp::class, ['id' => 'qvp_id']);
    }

}
