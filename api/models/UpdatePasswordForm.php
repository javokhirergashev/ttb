<?php

namespace api\models;

use common\modules\user\models\User;
use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;

class UpdatePasswordForm extends \yii\base\Model
{
    /**
     * @var
     */
    public $old_password;
    public $new_password;
    public $password_confirm;

    private $_user;

    /**
     * {@inheritdoc}
     */

    public function rules()
    {
        return [
            [['old_password', 'new_password', 'password_confirm'], 'required'],
            [['old_password', 'new_password', 'password_confirm'], 'trim'],
            [['old_password', 'new_password', 'password_confirm'], 'string'],
            ['old_password', 'validatePassword'],
            [['new_password'], 'string', 'min' => 6],
            [['password_confirm'], 'compare', 'compareAttribute' => 'new_password'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = User::findIdentity(\Yii::$app->user->id);
            if (!$user || !$user->validatePassword($this->old_password)) {
                $this->addError($attribute, "Old password incorrect");
            }
        }
    }

    /**
     * @return array|bool|User|null
     */
    public function save()
    {
        if (!$this->validate()) {
            return false;
        }

        /**
         * @var $user User
         */
        $user = $this->getUser();
        $user->setPassword($this->new_password);
        $user->generateAuthKey();
        $user->setToken();
        $user->save();

        return $user;
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findIdentity(Yii::$app->user->id);
        }

        return $this->_user;
    }
}
