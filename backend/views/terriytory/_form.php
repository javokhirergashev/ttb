<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Territory $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="territory-form">
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
            <div class="form-group row">
                <label class="col-form-label">Manzili</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'address')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Aholi soni</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'people_count')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Honadon son</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'home_count')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Qvp</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'qvp_id')->dropDownList(\common\models\Qvp::getDropDownList(), [
                    ])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>
