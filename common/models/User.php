<?php

namespace common\models;

use common\behaviors\DateTimeBehavior;
use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $verification_token
 * @property string $email
 * @property string|null $telegram_link
 * @property string|null $instagram_link
 * @property string|null $facebook_link
 * @property string|null $twitter_link
 * @property integer|null $gender
 * @property integer|null $category
 * @property integer|null $rate
 * @property integer|null $birthday
 * @property integer|null $retired
 * @property integer|null $decree
 * @property integer|null $disabled
 * @property integer|null $deputy
 * @property integer|null $qualification_date
 * @property integer|null $hayfsan
 *
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $position_id
 * @property integer $district_id
 * @property integer $qvp_id
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    const ROLE_ADMIN = 1;

    const ROLE_MANAGER = 2;
    const ROLE_STATIST = 3;
    const ROLE_DOCTOR = 4;
    const ROLE_NURSE = 5;

    const ROLE_USER = 'user';
    const ROLE_MANAGE = 'manager';
    const ROLE_ADMINISTRATOR = 'administrator';

    const ADMIN_ID = 1;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::class,
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
            [['phone_number', 'username'], 'required'],
            ['email', 'email'],
            [['avatar', 'birthday', 'qualification_date'], 'safe'],
            [['first_name', 'last_name', 'email', 'address', 'telegram_link', 'instagram_link', 'facebook_link', 'twitter_link'], 'string', 'max' => 255],
            [['first_name', 'last_name',], 'required'],
            [['status', 'role', 'position_id', 'qvp_id', 'district_id', 'gender', 'category', 'rate', 'retired', 'decree', 'disabled', 'deputy', 'hayfsan'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     *
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     *
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds user by verification email token
     *
     * @param string $token verify email token
     *
     * @return static|null
     */
    public static function findByVerificationToken($token)
    {
        return static::findOne([
            'verification_token' => $token,
            'status' => self::STATUS_INACTIVE
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     *
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int)substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     *
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Generates new token for email verification
     */
    public function generateEmailVerificationToken()
    {
        $this->verification_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }

    public static function getDropDownList($qvp_id = null)
    {
        if ($qvp_id) {
            return self::find()
                ->andWhere(['qvp_id' => $qvp_id])
                ->select("id, first_name as name")
                ->asArray()
                ->all();
        }
        return \yii\helpers\ArrayHelper::map(static::find()->where(['role' => self::ROLE_DOCTOR])->all(), 'id', 'first_name');
    }

    public function getPosition()
    {
        return $this->hasOne(Position::class, ['id' => 'position_id']);
    }

    public function getFullName()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function getRoleName()
    {
        if ($this->role == self::ROLE_DOCTOR) {
            return "Shifokor";
        } elseif ($this->role === self::ROLE_ADMIN) {
            return "Admin";
        } elseif ($this->role === self::ROLE_NURSE) {
            return "Hamshira";
        } elseif ($this->role === self::ROLE_MANAGER) {
            return "Manager";
        }
        return "User";
    }


}
