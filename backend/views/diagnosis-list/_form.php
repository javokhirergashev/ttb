<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\DiagnosisList $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="diagnosis-list-form">
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
                <label class="col-form-label">Tashxis sinfini tanlang</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'description')->dropDownList(\common\models\DiagnosisList::getClassName(), ['prompt' => "Tashxis sinfini tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Tashxis guruhini tanlang</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'description')->dropDownList(\common\models\DiagnosisList::getGroupName(), ['prompt' => "Tashxis guruhini tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Status</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'status')->dropDownList([
                        \common\models\DiagnosisGroup::STATUS_ACTIVE => "Active",
                        \common\models\DiagnosisGroup::STATUS_INACTIVE => "InActive",
                    ], ['prompt' => "Statusni tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
