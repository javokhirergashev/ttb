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
                <label class="col-form-label">Manzili</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'address')->textInput()->label(false) ?>
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
                <label class="col-form-label">OP raqami</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'number')->textInput()->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Viloyat</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'region_id')->dropDownList(Region::getDropDownList(), [
                        'value' => Region::NAMANGAN_ID
                    ])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <label class="col-form-label">Tuman</label>
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
                <label class="col-form-label">OP turi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'type')->dropDownList([
                        \common\models\Qvp::TYPE_CLINIC => "Poliklinika",
                        \common\models\Qvp::TYPE_QVP => "Qvp",
                    ], ['prompt' => "OP turini tanlang ..."])->label(false) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
        </div>

    </div>
    <?php ActiveForm::end(); ?>
</div>
