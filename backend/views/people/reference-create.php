<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Reference $model */
/** @var yii\widgets\ActiveForm $form */
/** @var \common\models\People $people */
$this->title = 'Malumotnomalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosis-form">
    <h4>Malumotnoma yaratish</h4>
    <?php $form = ActiveForm::begin(); ?>
    <div class="row card-box">

        <h3><strong class="font-weight-normal"> FIO</strong>
            : <?= $people->first_name . " " . $people->last_name . " " . $people->middle_name ?></h3>
        <h3><strong class="font-weight-normal"> Tugilgan yili</strong> : <?= $people->birthday ?></h3>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Turi</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'type')->dropDownList(\common\models\Reference::getTypeList())->label(false) ?>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="col-form-label">Qayerga (so'ralgan joy)</label>
                <div class="col-md-9">
                    <?= $form->field($model, 'where_to')->textInput()->label(false) ?>
                </div>
            </div>
        </div>

        <div class="form-group text-end">
            <?= Html::submitButton('Yaratish', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>
