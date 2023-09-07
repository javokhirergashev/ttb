<?php

use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/* @var $model \backend\models\form\UserForm
 * /** @var yii\widgets\ActiveForm $form
 */
?>
<div class="user-create-form-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-form-label">Ism</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'first_name')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Familiya</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'last_name')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">email</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Telefon</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Tug'ilgan kun, oy yil</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'birthday')->input('date')->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Malaka oshirgan sanasi</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'qualification_date')->input('date')->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Stavkasi</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'rate')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Nogironligi</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'disabled')->dropDownList([
                                    \common\models\UserCreateForm::DISABLED_TRUE => "Bor",
                                    \common\models\UserCreateForm::DISABLED_FALSE => "Yo'q",
                                ], ['prompt' => "Nogironligi"])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Nafaqaga chiqqanligi</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'retired')->dropDownList([
                                    \common\models\UserCreateForm::RETIRED_TRUE => "Nafaqada",
                                    \common\models\UserCreateForm::RETIRED_FALSE => "Nafaqada emas",
                                ], ['prompt' => "Nafaqadaligi"])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Xodimning surati</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'avatar')->fileInput(['accept' => 'image/*', 'class' => 'form-control'])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Instagram</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'instagram_link')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Facebook</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'facebook_link')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Tuman</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'district_id')->dropDownList(common\modules\country\models\District::getDropdownList(), [
                                    'prompt' => 'Tumanni tanlang',
                                    'options' => [
                                    ]
                                ])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Rol</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'role')->dropDownList([
                                    \common\models\User::ROLE_ADMIN => "admin",
                                    \common\models\User::ROLE_MANAGER => "menejer",
                                    \common\models\User::ROLE_STATIST => "statist",
                                    \common\models\User::ROLE_DOCTOR => "shifokor",
                                    \common\models\User::ROLE_NURSE => "Hamshira",
                                ], ['prompt' => "Rolni tanlang"])->label(false) ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-form-label">Login</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Parol</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'password')->passwordInput()->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Parolni takrorlang </label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'password_confirm')->passwordInput()->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Statusi</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'status')->dropDownList([
                                    \common\models\User::STATUS_ACTIVE => "Active",
                                    \common\models\User::STATUS_INACTIVE => "InActive",
                                ], ['prompt' => "Statusni tanlang"])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Jinsi</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'gender')->dropDownList([
                                    \common\models\UserCreateForm::GENDER_MALE => "Erkak",
                                    \common\models\UserCreateForm::GENDER_FEMALE => "Ayol",
                                ], ['prompt' => "Jinsini tanlang"])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">O'rindoshligi</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'deputy')->dropDownList([
                                    \common\models\UserCreateForm::DEPUTY_FALSE => "O'rindosh emas",
                                    \common\models\UserCreateForm::DEPUTY_TRUE => "O'rindosh",
                                ], ['prompt' => "O'rindoshligi"])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Dekret</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'decree')->dropDownList([
                                    \common\models\UserCreateForm::DECREE_FALSE => "Dekretda emas",
                                    \common\models\UserCreateForm::DECREE_TRUE => "Dekretda",
                                ], ['prompt' => "Dekretdaligi"])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Toifasi</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'category')->dropDownList([
                                    \common\models\UserCreateForm::WITHOUT_CATEGORY => "Toifasiz",
                                    \common\models\UserCreateForm::FIRST_CATEGORY => "1-toifa",
                                    \common\models\UserCreateForm::SECOND_CATEGORY => "2-toifa",
                                    \common\models\UserCreateForm::HIGHER_CATEGORY => "Oliy toifa",
                                ], ['prompt' => "Toifani tanlang"])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Hayfsan</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'hayfsan')->dropDownList([
                                    \common\models\UserCreateForm::HAYFSAN_FALSE => "Bor",
                                    \common\models\UserCreateForm::HAYFSAN_TRUE => "Yo'q",
                                ], ['prompt' => "Hayfsan belgilash"])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Lavozimi</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'position_id')->dropDownList(\common\models\Position::getPositionTitle(), [
                                    'prompt' => 'Lavozimni tanlang',
                                    'options' => [
                                    ]
                                ])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Telegram</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'telegram_link')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Twitter</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'twitter_link')->textInput(['maxlength' => true])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">QVP</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'qvp_id')->dropDownList(\common\models\Qvp::getDropdownList(), [
                                    'prompt' => 'QVP ni tanlang',
                                    'options' => [
                                    ]
                                ])->label(false) ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-form-label">Brigada</label>
                            <div class="col-md-9">
                                <?= $form->field($model, 'territory_id')->widget(DepDrop::classname(), [
                                    'pluginOptions' => [
                                        'depends' => ['territory-id'],
                                        'placeholder' => 'Uchastka tanlang',
                                        'url' => Url::to(['/people/territory']),
                                        'initialize' => true,
                                    ],
                                    'type' => DepDrop::TYPE_SELECT2,
                                ])->label(false); ?>
                                <?php
                                echo $form->field($model, 'territory_id')->widget(DepDrop::classname(), [
                                    'pluginOptions' => [
                                        'depends' => ['territory_code'],
                                        'placeholder' => 'Uchastkani  tanlang',
                                        'url' => Url::to(['/people/territory']),
                                        'initialize' => true,
                                    ],
                                    'type' => DepDrop::TYPE_SELECT2,
                                ])->label(false);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
                </div>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>




