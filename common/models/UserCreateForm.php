<?php

namespace common\models;

use Yii;

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
 * @property int|null $position_id
 *
 * @property Position $position
 * @property Queue[] $queues
 * @property Service[] $services
 * @property Service[] $services0
 */
class UserCreateForm extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone_number', 'auth_key', 'created_at', 'updated_at'], 'required'],
            [['type', 'role', 'created_at', 'updated_at', 'deleted_at', 'status', 'position_id'], 'integer'],
            [['phone_number', 'first_name', 'last_name', 'email', 'username', 'password_hash', 'verification_token', 'avatar'], 'string', 'max' => 255],
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
            'phone_number' => 'Phone Number',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'email' => 'Email',
            'username' => 'Username',
            'type' => 'Type',
            'role' => 'Role',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted_at' => 'Deleted At',
            'avatar' => 'Avatar',
            'status' => 'Status',
            'verification_token' => 'Verification Token',
            'position_id' => 'Position ID',
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
}
