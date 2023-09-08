<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\PregnantSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="pregnant-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'person_id') ?>

    <?= $form->field($model, 'diagnosis_id') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'height') ?>

    <?php // echo $form->field($model, 'weight_height_index') ?>

    <?php // echo $form->field($model, 'weight') ?>

    <?php // echo $form->field($model, 'pulse') ?>

    <?php // echo $form->field($model, 'blood_pressure') ?>

    <?php // echo $form->field($model, 'pregnant_week') ?>

    <?php // echo $form->field($model, 'utt_conclusion') ?>

    <?php // echo $form->field($model, 'stomach_diameter') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
