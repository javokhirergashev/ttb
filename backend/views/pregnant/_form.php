<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Pregnant $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pregnant-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row card-box">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Homiladorlik haftasi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'pregnant_week')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Bo'yi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'height')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Vazni</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'weight')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Bo'y-vazn indeksi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'weight_height_index')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Qorin diametri</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'stomach_diameter')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Qon bosimi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'blood_pressure')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Pulsi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'pulse')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Tashxis (MKB kod bo'yicha)</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'diagnosis_id')->dropDownList(\common\models\DiagnosisList::getDropDownList(), ['prompt' => "Statusni tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Umumiy tashxis</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'description')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Anamnez</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'pulse')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="form-group text-end">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
