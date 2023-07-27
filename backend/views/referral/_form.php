<?php

/**
 * @var $model Referral
 */

use common\models\Clinic;
use common\models\Referral;
use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="people-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row card-box">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Klinikani tanlang</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'clinic_id')->dropDownList(Clinic::getDropdownList(), ['id' => 'section-id', 'prompt' => "Kilinikani tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Bo'limni tanlang</label>
                <div class="col-md-9">
                    <?php
                    echo $form->field($model, 'section_id')->widget(DepDrop::classname(), [
                        'pluginOptions' => [
                            'depends' => ['section-id'],
                            'placeholder' => 'Bo\'limni tanlang',
                            'url' => Url::to(['/people/section']),
                            'initialize' => true,
                        ],
                        'type' => DepDrop::TYPE_SELECT2,
                    ])->label(false);
                    ?>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Yo'llanma turi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'type')->dropDownList(Referral::getTypeList(), ['prompt' => "Davolanish turini tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Tashxisni tanlang</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'diagnosis_list_id')->dropDownList(\common\models\DiagnosisList::getDropDownList(), ['prompt' => "Tashxisni tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Batafsil ma'lumot</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'comment')->textarea()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>
