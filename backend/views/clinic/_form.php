<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Clinic $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="clinic-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row card-box">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Shifoxona nomi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'name')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Izoh</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'description')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Manzil</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'address')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Viloyat</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'status')->dropDownList(\common\modules\country\models\Region::getDropDownList(),
                        ['prompt' => "Viloyatni tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Tuman</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'status')->dropDownList(\common\modules\country\models\District::getDropDownList(),
                        ['prompt' => "Tumanni tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Telefon raqam</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'phone_number')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Status</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'status')->dropDownList([
                        \common\models\Clinic::STATUS_ACTIVE => "Active",
                        \common\models\Clinic::STATUS_INACTIVE => "InActive",
                    ], ['prompt' => "Statusni tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="form-group text-end">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

</div>
