<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Login';
?>
<div class="main-wrapper login-body">
    <div class="container-fluid px-0">
        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
        <div class="row">
            <div class="col-lg-6 login-wrap">
                <div class="login-sec">
                    <div class="log-img">
                        <img class="img-fluid"  src="/backend-files/img/login-02.png" alt="Logo">
                    </div>
                </div>
            </div>
            <div class="col-lg-6 login-wrap-bg">
                <div class="login-wrapper">
                    <div class="loginbox">
                        <div class="login-right">
                            <div class="login-right-wrap">
                                <div class="account-logo">
                                    <a href="index.html"><img  src="/backend-files/img/login-logo.png" alt=""></a>
                                </div>
                                <h2>Login</h2>

                                <form action="">
                                    <div class="form-group">
                                        <label>Username <span class="login-danger">*</span></label>
                                        <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false) ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Password <span class="login-danger">*</span></label>
                                        <?= $form->field($model, 'password')->passwordInput()->label(false) ?>
                                        <span class="profile-views feather-eye-off toggle-password"></span>
                                    </div>
                                    <div class="forgotpass">
                                        <div class="remember-me">
                                            <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Remember me
                                                <?= $form->field($model, 'rememberMe')->checkbox()->label(false) ?>
                                                <span class="checkmark"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group login-btn">
                                        <button class="btn btn-primary btn-block" type="submit">Login</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
