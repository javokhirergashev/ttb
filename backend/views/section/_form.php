<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Section $model */
/** @var yii\widgets\ActiveForm $form */
/** @var \common\models\Clinic $clinic */
?>

<div class="diagnosis-form">
     <?php $form = ActiveForm::begin(); ?>
    <div class="row card-box">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Bo'lim nomi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'name')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Xonalar soni</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'room_count')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Status</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'status')->dropDownList([
                        \common\models\Section::STATUS_ACTIVE => "Active",
                        \common\models\Section::STATUS_INACTIVE => "InActive",
                    ], ['prompt' => "Statusni tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="form-group text-end">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>

</div>
