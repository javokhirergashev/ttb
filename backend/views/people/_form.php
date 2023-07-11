<?php

use common\modules\country\models\District;
use common\modules\country\models\Region;
use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\People $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="people-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row card-box">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Ism</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Familiya</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Otasining ismi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'middle_name')->textInput(['maxlength' => true])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Tug'ilgan kun, oy yil</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'birthday')->input('date')->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Jinsi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'gender')->dropDownList([
                        \common\models\People::GENDER_MALE => "Erkak",
                        \common\models\People::GENDER_FEMALE => "Ayol",
                    ], ['prompt' => "Jinsini tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Telefon raqami</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'phone_number')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Passport seriyasi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'passport_seria')->textInput(['maxlength' => 2])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Passport raqami</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'passport_number')->textInput(['maxlength' => 7])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Metrka seriyasi va raqami</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'metrka_number')->textInput(['maxlength' => true])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Pinfl</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'pinfl')->textInput(['maxlength' => 14])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Region</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'region_id')->dropDownList(Region::getDropDownList(), [
                        'value' => Region::NAMANGAN_ID
                    ])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">District</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'district_id')->dropDownList(District::getDropdownList(), ['id' => 'quarter-id', 'prompt' => "Hududni tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Mahalla</label>
                <div class="col-md-9">
                    <?php
                    echo $form->field($model, 'quarterIds')->widget(DepDrop::classname(), [
                        'pluginOptions' => [
                            'depends' => ['quarter-id'],
                            'placeholder' => 'MFY ni tanlang',
                            'url' => Url::to(['/qvp/quarter']),
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
                <label class="col-form-label">QVP</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'qvp_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Qvp::find()->where(['status' => \common\models\Qvp::STATUS_ACTIVE])->all(), 'id', 'title'), [
                        'prompt' => 'QVP ni tanlang',
                        'options' => [
                        ]
                    ])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Uchastka</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'territory_code')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Territory::find()->where(['status' => \common\models\Qvp::STATUS_ACTIVE])->all(), 'id', 'name'), [
                        'prompt' => 'Uchastkani tanlang',
                        'options' => [
                        ]
                    ])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Status</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'status')->dropDownList([
                        \common\models\People::STATUS_ACTIVE => "Active",
                        \common\models\People::STATUS_INACTIVE => "InActive",
                    ], ['prompt' => "Statusni tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>
