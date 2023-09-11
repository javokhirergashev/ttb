<?php

namespace backend\models\form;

use common\behaviors\DateTimeBehavior;
use common\models\StaticFunctions;
use common\models\User;
use yii\base\Exception;
use yii\web\UploadedFile;

class UserForm extends \yii\base\Model
{

    /**
     * @var
     */
    public $phone_number;
    public $username;
    public $email;
    public $password;
    public $password_confirm;
    public $first_name;
    public $last_name;
    public $role;
    public $id;
    public $status;
    public $avatar;
    public $birthday;
    public $address;
    public $user_id;
    public $qvp_id;
    public $district_id;
    public $position_id;
    public $telegram_link;
    public $instagram_link;
    public $facebook_link;
    public $gender;
    public $category;
    public $rate;
    public $retired;
    public $decree;
    public $disabled;
    public $deputy;
    public $qualification_date;
    public $hayfsan;
    public $twitter_link;
    public $territory_id;



    const SCENARIO_REGISTER = 'register';
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
            [['phone_number', 'username'], 'required'],
            [['birthday', 'qualification_date'], 'safe'],
            [['password', 'position_id'], 'required', 'on' => self::SCENARIO_REGISTER],
//            ['username', 'unique', 'targetAttribute' => 'username', 'targetClass' => User::class],
            ['username', 'validateUsername'],
            ['email', 'email'],
            [['avatar'], 'safe'],
            [['password'], 'string', 'min' => 6, 'max' => 16],
            [['first_name', 'last_name', 'email', 'address', 'telegram_link', 'instagram_link', 'facebook_link', 'twitter_link'], 'string', 'max' => 255],
            [['first_name', 'last_name',], 'required'],
            [['status', 'role', 'user_id', 'id', 'qvp_id', 'district_id', 'position_id', 'gender', 'category', 'rate', 'retired', 'decree', 'disabled', 'deputy', 'hayfsan', 'territory_id'], 'integer'],
            [['password_confirm'], 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['register'] = ['username', 'email', 'password', 'phone_number', 'avatar', 'first_name', 'last_name',
            'password_confirm', 'status', 'role', 'birthday', 'address', 'position_id', 'qvp_id', 'district_id',
            'telegram_link', 'instagram_link', 'facebook_link', 'twitter_link', 'gender', 'category', 'rate', 'retired',
            'decree', 'disabled', 'deputy', 'hayfsan', 'birthday', 'qualification_date', 'territory_id'];
        return $scenarios;
    }

    public function validateUsername($attribute)
    {
        $user = User::findOne(['username' => $this->username]);
        if ($user && $user->id != $this->user_id) {
            $this->addError("username", "This username already exists");
        }
    }

    /**
     * @return $this|User|false
     * @throws Exception
     */
    public function save()
    {
        if (! $this->validate()) {
            return false;
        }

        $user = $this->createOrUpdateUser();
        return $user;
    }

    /**
     * @return User|false
     * @throws Exception
     */
    private function createOrUpdateUser()
    {
        $user = new User();
        if ($this->user_id) {
            $user = User::findOne($this->user_id);
            if (! $user) {
                $this->addError("user_id", "User not found");
                return false;
            }
        }

        $user->setAttributes([
            'phone_number' => $this->phone_number,
            'status' => $this->status,
            'role' => $this->role,
            'username' => $this->username,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'birthday' => $this->birthday,
            'position_id' => $this->position_id,
            'gender' => $this->gender,
            'category' => $this->category,
            'rate' => $this->rate,
            'retired' => $this->retired,
            'decree' => $this->decree,
            'disabled' => $this->disabled,
            'deputy' => $this->deputy,
            'qualification_date' => $this->qualification_date,
            'hayfsan' => $this->hayfsan,
            'qvp_id' => $this->qvp_id,
            'district_id' => $this->district_id,
            'telegram_link' => $this->telegram_link,
            'instagram_link' => $this->instagram_link,
            'facebook_link' => $this->facebook_link,
            'twitter_link' => $this->facebook_link,
            'territory_id' => $this->territory_id
        ]);

        if ($this->password) {
            $user->generateAuthKey();
            $user->setPassword($this->password);
        }

        if (! $user->save()) {
            $this->addErrors($user->errors);
            return false;
        }

        if ($this->avatar instanceof UploadedFile) {
            $avatar = StaticFunctions::saveImage('user', $user->id, $this->avatar);
            $user->updateAttributes(['avatar' => $avatar]);
        }

        return $user;
    }


}