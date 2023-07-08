<?php

use common\modules\country\models\District;
use common\modules\country\models\Region;
use kartik\depdrop\DepDrop;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Qvp $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="qvp-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row card-box">
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Nomi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'title')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Address</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'address')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Phone number</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'phone_number')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Qvp number</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'number')->textInput()->label(false) ?>
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
            <div class="form-group row" style="padding-top: 20px!important;">
                <label class="col-form-label">District</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'district_id')->dropDownList(District::getDropdownList(), ['id' => 'quarter-id', 'prompt' => "Hududni tanlang"])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row" style="padding-top: 20px!important;">
                <label class="col-form-label">Quarter</label>
                <div class="col-md-9">
                    <?php
                    echo $form->field($model, 'quarterIds')->widget(DepDrop::classname(), [
                        'pluginOptions' => [
                            'depends' => ['quarter-id'],
                            'placeholder' => 'MFY ni tanlang',
                            'url' => Url::to(['/qvp/quarter']),
                            'initialize' => true,
                        ],
                        'options' => [
                            'class' => 'form-control',
                            'placeholder' => 'MFY ni tanlang',
                            'multiple' => true
                        ],
                        'type' => DepDrop::TYPE_SELECT2,
                    ])->label(false);
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row" style="padding-top: 20px!important;">
                <label class="col-form-label">Qvp turi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'type')->dropDownList([
                        \common\models\Qvp::TYPE_CLINIC => "Kilinika",
                        \common\models\Qvp::TYPE_QVP => "Qvp",
                    ], ['prompt' => "Qvp turini tanlang ..."])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>
