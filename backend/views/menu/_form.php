<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Menu $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="menu-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-12">
            <div class="card-box">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <?php $languages = ['uz', 'en', 'ru'] ?>

                    <?php foreach ($languages as $key => $language): ?>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link <?= $key != 0 ? ' ' : 'active' ?>"
                                    id="<?= $language ?>-tab"
                                    data-bs-toggle="tab"
                                    data-bs-target="#<?= $language ?>" type="button" role="tab"
                                    aria-controls="<?= $language ?>"
                                    aria-selected="true"><?= $language ?>
                            </button>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <form action="#">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <div class="tab-content" id="myTabContent">
                                    <?php foreach ($languages
                                                   as $key => $language): ?>
                                        <div class="tab-pane <?= $key != 0 ? ' ' : 'show active' ?>"
                                             id="<?= $language ?>" role="tabpanel"
                                             aria-labelledby="<?= $language ?>-tab">
                                            <div class="col-md-12">
                                                <div class="form-group row">
                                                    <label class="col-form-label">Nomi</label>
                                                    <div class="col-md-9" style="margin-right: 0px!important;">
                                                        <?= $form->field($model, 'title[' . $language . ']')->textInput(['maxlength' => true])->label(false) ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row" style="padding-top: 20px!important;">
                                <label class="col-form-label">Statusi</label>
                                <div class="col-md-9">
                                    <?= $form->field($model, 'status')->textInput()->label(false) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-form-label">Ota menyusi</label>
                                <div class="col-md-9">
                                    <?= $form->field($model, 'parent_id')->textInput()->label(false) ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
                        </div>
                </form>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
