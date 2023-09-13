<?php

namespace api\models;

use common\modules\user\models\User;
use Yii;
use yii\base\Model;


/**
 * Password reset request form
 */
class PasswordResetRequestForm extends Model
{
    public $email;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist',
                'targetClass' => '\common\modules\user\models\User',
                'filter' => ['status' => User::STATUS_ACTIVE],
                'message' => 'There is no user with this email address.'
            ],
        ];
    }


    public function sendEmail()
    {

        /* @var $user User */

        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if ($user) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return $user->errors;
            }
            Yii::$app->mailer->compose()
                ->setFrom(getenv('MAILER_USERNAME'))
                ->setTo($this->email)
                ->setSubject('Password reset for ' . Yii::$app->name)
                ->setHtmlBody('Your Token: <a href="http://funzone.uz/reset-password/?token=' . $user->password_reset_token . '"> Reset Password</a>')
                ->send();
        }

        return $user;
    }

    public function generateToken()
    {
        /* @var $user User */
        $user = User::findOne([
            'status' => User::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if ($user) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return $user->errors;
            }
        }
        return $user;

    }
}
