<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/* @var $model \backend\models\form\UserForm
/** @var yii\widgets\ActiveForm $form */
?>
<div class="user-create-form-form">
   <div class="row">
      <?php $form = ActiveForm::begin(); ?>
      <div class="col-md-12">
         <div class="card-box">
            <form action="#">
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
                        <label class="col-form-label">Xodimning surati</label>
                        <div class="col-md-9">
                           <?= $form->field($model, 'avatar')->fileInput(['accept' => 'image/*', 'class' => 'form-control'])->label(false) ?>
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
                        <label class="col-form-label">Statusi</label>
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
               </div>
               <div class="form-group">
                  <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
               </div>
            </form>
         </div>
         <?php ActiveForm::end(); ?>
      </div>
   </div>
</div>




