<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var $model \backend\models\form\ProfileUpdateForm
 */


?>
<div class="diagnosis-form">
   <a href="<?= \yii\helpers\Url::to(['user/profile']) ?>">Ortga</a> <?php $form = ActiveForm::begin(); ?>
   <div class="row card-box">
      <div class="col-md-6">
         <div class="form-group">
            <label class="col-form-label">Ismi</label>
            <div class="col-md-9">
               <?= $form->field($model, 'first_name')->textInput()->label(false) ?>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group row">
            <label class="col-form-label">Familiyasi</label>
            <div class="col-md-9">
               <?= $form->field($model, 'last_name')->textInput()->label(false) ?>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group row">
            <label class="col-form-label">Telefon nomer</label>
            <div class="col-md-9">
               <?= $form->field($model, 'phone_number')->textInput()->label(false) ?>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group row">
            <label class="col-form-label">Email</label>
            <div class="col-md-9">
               <?= $form->field($model, 'email')->textInput()->label(false)?>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group row">
            <label class="col-form-label">Parol</label>
            <div class="col-md-9">
               <?= $form->field($model, 'password')->passwordInput()->label(false) ?>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="form-group row">
            <label class="col-form-label">Parolni takrorlang</label>
            <div class="col-md-9">
               <?= $form->field($model, 'password_confirm')->passwordInput()->label(false) ?>
            </div>
         </div>
      </div>

      <div class="form-group text-end">
         <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
      </div>

   </div>
   <?php ActiveForm::end(); ?>

</div>


