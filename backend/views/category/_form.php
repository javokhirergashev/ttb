<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Category $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="category-form">
    <div class="row">
        <?php $form = ActiveForm::begin(); ?>
        <div class="col-md-12">
            <div class="card-box">
                <form action="#">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Nomi</label>
                                <div class="col-md-9">
                                    <?= $form->field($model, 'title')->textarea(['rows' => 6])->label(false) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Ikonkasi</label>
                                <div class="col-md-9">
                                    <?= $form->field($model, 'icon')->textInput(['maxlength' => true])->label(false) ?>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Statusi</label>
                                    <div class="col-md-9">
                                        <?= $form->field($model, 'status')->textInput()->label(false) ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-md-3 col-form-label">Ikonkasi</label>
                                    <div class="col-md-9">
                                        <?= $form->field($model, 'type')->textInput()->label(false) ?>
                                    </div>
                                </div>
                            </div>
                        <div class="form-group">
                            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>
                        </div>

                    </div>
                </form>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
