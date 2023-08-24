<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Pregnant $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pregnant-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'diagnosis_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'height')->textInput() ?>

    <?= $form->field($model, 'weight_height_index')->textInput() ?>

    <?= $form->field($model, 'weight')->textInput() ?>

    <?= $form->field($model, 'pulse')->textInput() ?>

    <?= $form->field($model, 'blood_pressure')->textInput() ?>

    <?= $form->field($model, 'pregnant_week')->textInput() ?>

    <?= $form->field($model, 'utt_conclusion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'stomach_diameter')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
