<?php

namespace backend\models\form;

use common\models\StaticFunctions;
use common\models\User;
use yii\base\Exception;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class ProfileUpdateForm extends \yii\base\Model
{

    /**
     * @var
     */
    public $phone_number;
    public $email;


    public $password;

    public $password_confirm;

    public $first_name;

    public $last_name;
    public $avatar;
    public $birthday;
    public $address;
    private $_user;

    public function __construct($config = [])
    {
        $user = User::findOne(\Yii::$app->user->id);
        $this->_user = $user;
        $this->setAttributes($user->attributes);
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone_number'], 'required'],
//            ['username', 'unique', 'targetAttribute' => 'username', 'targetClass' => User::class],
            ['email', 'email'],
            [['password'], 'string', 'min' => 6, 'max' => 16],
            [['first_name', 'last_name', 'email', 'birthday', 'address'], 'string', 'max' => 255],
            [['first_name', 'last_name',], 'required'],
            [['password_confirm'], 'compare', 'compareAttribute' => 'password'],
        ];
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
        $user = $this->_user;
        if (! $user) {
            throw new NotFoundHttpException("Model not found");
        }

        $user->setAttributes([
            'phone_number' => $this->phone_number,
            'email' => $this->email,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'address' => $this->address,
            'birthday' => $this->birthday,
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
            $user->updateAttributes(['avatar_id' => $avatar]);
        }

        return $user;

    }

    /**
     * @return User|false
     * @throws Exception
     */


}