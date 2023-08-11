<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\VaccinationPeople $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="vaccination-people-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row card-box">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Emlash sinfi nomi</label>
                <div class="col-md-9">
                    <div class="col-md-9">
                        <?= $form->field($model, 'vaccination_class_id')->dropDownList(\common\models\VaccinationClass::getDropDownList(),
                            ['prompt' => "Emlash sinfini tanlang"])->label(false) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Vaksina nomi</label>
                <div class="col-md-9">
                    <div class="col-md-9">
                        <?= $form->field($model, 'vaccination_id')->dropDownList(\common\models\Vaccination::getDropDownList(),
                            ['prompt' => "Vaksina nomini tanlang"])->label(false) ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Miqdori</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'amount')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Muddati</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'period')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Vaksina seriyasi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'seria')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Preparat nomi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'preparat_name')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Emlashga reaksiyalar (mahalliy, umumiy)</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'reaction')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Emlashga reaksiyalar (mahalliy)</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'reaction_local')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Emlashga reaksiyalar (umumiy)</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'reaction_common')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Tibbiyot qarshiligi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'medical_repulse')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="form-group text-end">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
