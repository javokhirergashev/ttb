<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\News $model */
/** @var yii\widgets\ActiveForm $form */
$this->registerJsFile("@web/backend-files/ckeditor/ckeditor.js");

$js = <<<JS
    CKEDITOR.replace( 'news-description-uz' );
    CKEDITOR.replace( 'news-description-ru' );
    CKEDITOR.replace( 'news-description-en' );
JS;
$this->registerJs($js);

?>
<div class="news-form">
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
                                <div class="form-group row">
                                    <div class="tab-content" id="myTabContent">
                                        <?php foreach ($languages
                                                       as $key => $language): ?>
                                            <div class="tab-pane <?= $key != 0 ? ' ' : 'show active' ?>"
                                                 id="<?= $language ?>" role="tabpanel"
                                                 aria-labelledby="<?= $language ?>-tab">
                                                <div class="col-md-12">
                                                    <div class="form-group row">
                                                        <label class="col-form-label">Sarlavhasi</label>
                                                        <div class="col-md-9" style="margin-right: 0px!important;">
                                                            <?= $form->field($model, 'title[' . $language . ']')->textInput()->label(false) ?>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-md-12">
                                                            <label class="col-form-label">Yangilik matni</label>
                                                            <div class="col-md-9" style="margin-right: 0px!important;">
                                                                <?= $form->field($model, 'description[' . $language . ']')->textarea(['rows' =>7])->label(false) ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row" style="padding-top: 20px!important;">
                                <label class="col-form-label">Qo'shimcha rasm</label>
                                <div class="col-md-9">
                                    <?= $form->field($model, 'poster')->fileInput(['accept' => 'image/*', 'class' => 'form-control'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label">Asosiy rasm</label>
                                <div class="col-md-9">
                                    <?= $form->field($model, 'main_image')->fileInput(['accept' => 'image/*', 'class' => 'form-control'])->label(false) ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label">Statusi</label>
                                <div class="col-md-9">
                                    <?= $form->field($model, 'status')->dropDownList([
                                        \common\models\News::STATUS_ACTIVE => "Active",
                                        \common\models\News::STATUS_INACTIVE => "InActive",
                                    ], ['prompt' => "Statusni tanlang"])->label(false) ?>
                                </div>
                            </div>
<!--                            <div class="form-group row">-->
<!--                                <label class="col-form-label">Yangilik turi</label>-->
<!--                                <div class="col-md-9">-->
<!--                                    --><?//= $form->field($model, 'type')->textInput()->label(false) ?>
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-group row">-->
<!--                                <label class="col-form-label">Yangilik kategoriyasi</label>-->
<!--                                <div class="col-md-9">-->
<!--                                    --><?//= $form->field($model, 'category_id')->textInput()->label(false) ?>
<!--                                </div>-->
<!--                            </div>-->
<!--                            <div class="form-group row">-->
<!--                                <label class="col-form-label">Yangilikni chop etilish sanasi</label>-->
<!--                                <div class="col-md-9">-->
<!--                                    --><?//= $form->field($model, 'published_at')->input('date')->label(false) ?>
<!--                                </div>-->
<!--                            </div>-->
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
