<?php

namespace api\models\form;

use common\modules\file\models\File;
use common\modules\user\models\User;
use yii\base\Model;

class UserProfileForm extends Model
{
    public $phone_number;
    public $username;
    /**
     * @var
     */

    public $password;

    public $password_confirm;

    public $first_name;

    public $last_name;
    public $role;

    public $avatar_id;
    public $email;
    public $user_id;

    public function rules()
    {
        return [
            [['phone_number', 'first_name', 'last_name', 'user_id'], 'required'],
            ['avatar_id', 'exist', 'skipOnError' => true, 'targetClass' => File::class, 'targetAttribute' => ['avatar_id' => 'id']],
            [['password'], 'string', 'min' => 6, 'max' => 16],
            [['first_name', 'last_name',], 'string', 'max' => 255],
            [['avatar_id', 'role', 'user_id'], 'integer'],
            [['password_confirm'], 'compare', 'compareAttribute' => 'password'],
        ];
    }


    public function save()
    {

        if (! $this->validate()) {
            return false;
        }
        $user = $this->getUser();
        $user->setAttributes([
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'avatar_id' => $this->avatar_id,
            'phone_number' => $this->phone_number,
            'email' => $this->email
        ]);

        if ($this->password) {
            $user->setPassword($this->password);
        }

        if (! $user->save()) {
            $this->addErrors($user->errors);
            return false;
        }

        return $user;


    }


    public function getUser()
    {
        return User::findOne($this->user_id);
    }
}