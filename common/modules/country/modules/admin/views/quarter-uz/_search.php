<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\country\models\search\QuarterSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quarter-uz-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'district_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'top') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
