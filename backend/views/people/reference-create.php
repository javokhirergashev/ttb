<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Reference $model */
/** @var yii\widgets\ActiveForm $form */
/** @var \common\models\People $people */
?>
<div class="diagnosis-form">
    <a href="<?= \yii\helpers\Url::to(['user/profile']) ?>">Ortga</a>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row card-box">
        <h3><strong class="font-weight-normal"> FIO</strong>
            : <?= $people->first_name . " " . $people->last_name . " " . $people->middle_name ?></h3>
        <h3><strong class="font-weight-normal"> Tugilgan yili</strong> : <?= $people->birthday ?></h3>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Maqsad</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'reason')->textarea()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Qayerga (so'ralgan joyga)</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'where_to')->textarea()->label(false) ?>
                </div>
            </div>
        </div>

        <div class="form-group text-end">
            <?= Html::submitButton('Yaratish', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
