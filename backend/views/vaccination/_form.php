<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Vaccination $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vaccination-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row card-box">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Vaksina nomi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'name')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Emlash yoshi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'time')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Emlash sinfi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'vaccination_class_id')->dropDownList(\common\models\VaccinationClass::getDropDownList(), ['prompt' => "Emlash sinfini tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Status</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'status')->dropDownList([
                        \common\models\Vaccination::STATUS_ACTIVE => "Faol",
                        \common\models\Vaccination::STATUS_INACTIVE => "Faol emas",
                    ], ['prompt' => "Statusni tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="form-group text-end">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
