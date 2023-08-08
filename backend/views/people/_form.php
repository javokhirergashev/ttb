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
                <label class="col-form-label">Oila boshi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'head_family')->dropDownList([
                        \common\models\People::OILA_BOSHI_TRUE => "Ha",
                        \common\models\People::OILA_BOSHI_FALSE => "Yo'q",
                    ], ['prompt' => "Oila boshi sifatida belgilash"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Ayollar daftarida turishi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'ayol_daftar')->dropDownList([
                        \common\models\People::AYOL_DAFTAR_TRUE => "Ha",
                        \common\models\People::AYOL_DAFTAR_FALSE => "Yo'q",
                    ], ['prompt' => "Ayollar daftarida turishi"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Temir daftarida turishi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'temir_daftar')->dropDownList([
                        \common\models\People::TEMIR_DAFTAR_TRUE => "Ha",
                        \common\models\People::TEMIR_DAFTAR_FALSE => "Yo'q",
                    ], ['prompt' => "Temir daftarda turishi"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Yoshlar daftarida turishi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'yoshlar_daftar')->dropDownList([
                        \common\models\People::YOSHLAR_DAFTAR_TRUE => "Ha",
                        \common\models\People::YOSHLAR_DAFTAR_FALSE => "Yo'q",
                    ], ['prompt' => "Yoshlar daftarda turishi"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">"D" nazorati</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'dispensary_control')->dropDownList([
                        \common\models\People::DISPENSARY_CONTROL_TRUE => "Turadi",
                        \common\models\People::DISPENSARY_CONTROL_FALSE => "Turmaydi",
                    ], ['prompt' => "'D' nazoratda turishi"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Nogironlik sinfi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'disablity_class_id')->dropDownList(\common\models\DisablityClass::getDropDownList(),
                        ['prompt' => "Nogironlik sinfi"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Nogironlik guruhi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'disability_group')->dropDownList([
                        \common\models\People::DISABILITY_FALSE => "Yo'q",
                        \common\models\People::DISABILITY_FIRST => "I guruh",
                        \common\models\People::DISABILITY_SECOND => "II guruh",
                        \common\models\People::DISABILITY_THIRD => "III guruh",
                        \common\models\People::DISABILITY_FOURTH => "IV guruh",
                    ], ['prompt' => "Nogironlik guruhi"])->label(false) ?>
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
                <label class="col-form-label">Ish joyi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'job')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Bo'yi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'height')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Vazni</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'weight')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Qon bosimi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'blood_pressure')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Saturatsiyasi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'saturation')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Pulsi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'pulse')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Passport seriyasi va raqami</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'passport_number')->textInput(['maxlength' => 9])->label(false) ?>
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
                    echo $form->field($model, 'quarter_id')->widget(DepDrop::classname(), [
                        'options' => ['id' => 'qvp-id'],
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
                    <?= $form->field($model, 'qvp_id')->widget(DepDrop::classname(), [
                        'options' => ['id' => 'territory-id'],
                        'pluginOptions' => [
                            'depends' => ['qvp-id'],
                            'placeholder' => 'Qvp tanlang',
                            'url' => Url::to(['/qvp/qvp']),
                            'initialize' => true,
                        ],
                        'type' => DepDrop::TYPE_SELECT2,
                    ])->label(false); ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Uchastka</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'territory_id')->widget(DepDrop::classname(), [
                        'pluginOptions' => [
                            'depends' => ['territory-id'],
                            'placeholder' => 'Uchastka tanlang',
                            'url' => Url::to(['/people/territory']),
                            'initialize' => true,
                        ],
                        'type' => DepDrop::TYPE_SELECT2,
                    ])->label(false); ?>
                    <?php
                    echo $form->field($model, 'territory_id')->widget(DepDrop::classname(), [
                        'pluginOptions' => [
                            'depends' => ['territory_code'],
                            'placeholder' => 'Uchastkani  tanlang',
                            'url' => Url::to(['/people/territory']),
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
