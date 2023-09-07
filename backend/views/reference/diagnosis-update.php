<?php

use common\models\Reference;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ReferenceDiagnosis $model */
/** @var yii\widgets\ActiveForm $form */
/** @var \common\models\People $people */
/** @var \common\models\ReferenceDiagnosis[] $referenceDiagnosis */
/** @var \common\models\Reference[] $reference */
$this->title = 'Malumotnomalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosis-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row card-box">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-form-label">Tashxis</label>
                    <div class="col-md-9">
                        <?= $form->field($model, 'diagnosis')->textarea()->label(false) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-form-label">Shifokor</label>
                    <div class="col-md-9">
                        <?= $form->field($model, 'position')->dropDownList(\common\models\ReferenceDiagnosis::getPositionList())->label(false) ?>
                    </div>
                </div>
            </div>

            <div class="form-group text-end">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>

            </div>
    </div>
    <?php ActiveForm::end(); ?>
</div>

