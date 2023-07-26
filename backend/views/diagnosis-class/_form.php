<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\DiagnosisClass $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="diagnosis-class-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row card-box">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Nomi</label>
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
                <label class="col-form-label">Status</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'status')->dropDownList([
                        \common\models\DiagnosisClass::STATUS_ACTIVE => "Active",
                        \common\models\DiagnosisClass::STATUS_INACTIVE => "InActive",
                    ], ['prompt' => "Statusni tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('description', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
