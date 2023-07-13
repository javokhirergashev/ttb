<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Diagnosis $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="diagnosis-form">
    <a href="<?= \yii\helpers\Url::to(['user/profile']) ?>">Ortga</a>    <?php $form = ActiveForm::begin(); ?>
    <div class="row card-box">
        <h3><strong class="font-weight-normal">  FIO</strong> :  Bahodir Ortiqov Zokirjon ogli</h3>
        <h3><strong class="font-weight-normal"> Tugilgan yili</strong> : 20.02.1989</h3>
        <h3><strong class="font-weight-normal"> Test</strong> : Yana nimaduri kerak bolsa qoshamiz</h3>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Tashxis nomi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'title')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Tashxis turi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'type')->dropDownList([1 => 'test', 2 => "Qandaydur tashxis boladi baza qilish kerak "], ['prompt' => 'Tashxis turini tanlang'])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="form-group row">
                <label class="col-form-label">Tashxis to'liq matni</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'description')->textarea()->label(false) ?>
                </div>
            </div>
        </div>

        <div class="form-group text-end">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

</div>
