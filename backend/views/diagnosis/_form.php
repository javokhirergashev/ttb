<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Diagnosis $model */
/** @var yii\widgets\ActiveForm $form */
/** @var \common\models\People $people */
?>

<div class="diagnosis-form">
    <a href="<?= \yii\helpers\Url::to(['user/profile']) ?>">Ortga</a> <?php $form = ActiveForm::begin(); ?>
    <div class="row card-box">
        <h3><strong class="font-weight-normal"> FIO</strong>
            : <?= $people->first_name . " " . $people->last_name . " " . $people->middle_name ?></h3>
        <h3><strong class="font-weight-normal"> Tugilgan yili</strong> : <?= $people->birthday ?></h3>
        <h3><strong class="font-weight-normal"> Test</strong> : Yana nimaduri kerak bolsa qoshamiz</h3>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Shikoyat</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'complaint')->textarea()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Tashxis</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'diagnosis')->textarea()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Yondosh tashxis</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'description')->textarea()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Xulosa</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'conclusion')->textarea()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Ma'lumotnoma</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'anamnez')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Tashxis turi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'diagnosis_list_id')->dropDownList(\common\models\DiagnosisList::getDropDownList(), ['prompt' => 'Tashxis turini tanlang'])->label(false) ?>
                </div>
            </div>
        </div>


        <div class="form-group text-end">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

</div>
