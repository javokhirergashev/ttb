<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\News $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="news-form">
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
                                <label class="col-md-3 col-form-label">Izoh</label>
                                <div class="col-md-9">
                                    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label(false) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Qo'shimcha rasm</label>
                                <div class="col-md-9">
                                    <?= $form->field($model, 'poster')->fileInput(['accept' => 'image/*', 'class' => 'form-control'])->label(false) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Asosiy rasm</label>
                                <div class="col-md-9">
                                    <?= $form->field($model, 'main_image')->fileInput(['accept' => 'image/*', 'class' => 'form-control'])->label(false) ?>
                                </div>
                            </div>
                        </div>
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
                                <label class="col-md-3 col-form-label">Yangilik turi</label>
                                <div class="col-md-9">
                                    <?= $form->field($model, 'type')->textInput()->label(false) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Yangilik kategoriyasi</label>
                                <div class="col-md-9">
                                    <?= $form->field($model, 'category_id')->textInput()->label(false) ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Yangilikni chop etilish sanasi</label>
                                <div class="col-md-9">
                                    <?= $form->field($model, 'published_at')->input('date')->label(false) ?>
                                </div>
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
