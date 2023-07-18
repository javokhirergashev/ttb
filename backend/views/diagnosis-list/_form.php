<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\DiagnosisList $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="diagnosis-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'diagnosis_class_id')->textInput() ?>

    <?= $form->field($model, 'diagnosis_group_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
