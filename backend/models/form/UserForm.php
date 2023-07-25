<?php

namespace backend\models\form;

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


    const SCENARIO_REGISTER = 'register';

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone_number', 'username'], 'required'],
            [['password', 'position_id'], 'required', 'on' => self::SCENARIO_REGISTER],
//            ['username', 'unique', 'targetAttribute' => 'username', 'targetClass' => User::class],
            ['username', 'validateUsername'],
            ['email', 'email'],
            [['avatar'], 'safe'],
            [['password'], 'string', 'min' => 6, 'max' => 16],
            [['first_name', 'last_name', 'email', 'birthday', 'address'], 'string', 'max' => 255],
            [['first_name', 'last_name',], 'required'],
            [['status', 'role', 'user_id', 'id', 'qvp_id', 'district_id', 'position_id'], 'integer'],
            [['password_confirm'], 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['register'] = ['username', 'email', 'password', 'phone_number', 'avatar', 'first_name', 'last_name',
            'password_confirm', 'status', 'role', 'birthday', 'address', 'position_id', 'qvp_id', 'district_id'];

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
            'qvp_id' => $this->qvp_id,
            'district_id' => $this->district_id
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