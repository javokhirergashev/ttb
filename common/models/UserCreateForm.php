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
 * @property int|null $gender
 * @property int|null $category
 * @property int|null $rate
 * @property int|null $birthday
 * @property int|null $retired
 * @property int|null $decree
 * @property int|null $disabled
 * @property int|null $deputy
 * @property int|null $qualification_date
 * @property int|null $hayfsan
 * @property int|null $territory_id
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
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const RETIRED_TRUE = 1;
    const RETIRED_FALSE = 2;
    const WITHOUT_CATEGORY = 0;
    const FIRST_CATEGORY = 1;
    const SECOND_CATEGORY = 2;
    const HIGHER_CATEGORY = 3;
    const DECREE_FALSE = 0;
    const DECREE_TRUE = 1;
    const DISABLED_FALSE = 0;
    const DISABLED_TRUE = 1;
    const DEPUTY_FALSE = 0;
    const DEPUTY_TRUE = 1;
    const HAYFSAN_FALSE = 0;
    const HAYFSAN_TRUE = 1;

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
            'birthday' => [
                'class' => DateTimeBehavior::class,
                'attribute' => 'birthday',  //атрибут модели, который будем менять
                'format' => 'dd.MM.yyyy',   //формат вывода даты для пользователя
//                'default' => 'today'
            ],
            'qualification_date' => [
                'class' => DateTimeBehavior::class,
                'attribute' => 'qualification_date',  //атрибут модели, который будем менять
                'format' => 'dd.MM.yyyy',   //формат вывода даты для пользователя
//                'default' => 'today'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password', 'birthday', 'qualification_date'], 'safe'],
            [['type', 'role', 'created_at', 'updated_at', 'deleted_at', 'status', 'district_id', 'position_id', 'gender', 'category', 'rate', 'retired', 'decree', 'disabled', 'deputy', 'hayfsan', 'terrytory_id'], 'integer'],
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
            'gender' => 'Jinsi',
            'category' => 'Toifasi',
            'rate' => 'Stabkasi',
            'birthday' => 'Tug\'ilgan vaqti',
            'retired' => 'Nafaqa',
            'decree' => 'Dekret',
            'disabled' => 'Nogironligi',
            'deputy' => 'O\'rindoshligi',
            'qualification_date' => 'Malaka oshirgan vaqti',
            'hayfsan' => 'Hayfsan',
            'district_id' => 'Tuman',
            'telegram_link' => 'Telegram',
            'facebook_link' => 'Facebook',
            'instagram_link' => 'Instagram',
            'twitter_link' => 'Twitter',
            'terrytory_id' => 'Brigadasi'
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

    public function getTerritory()
    {
        return $this->hasOne(Territory::class, ['id' => 'terrytory_id']);
    }
}
