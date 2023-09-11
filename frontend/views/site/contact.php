2<?php

use common\widgets\Alert;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Request $model */
/** @var yii\widgets\ActiveForm $form */

$contact = common\models\Contact::getContact("first_email");
?>
<style>
    .form-group {
        margin-bottom: 20px;
    }
</style>
<div class="page-title-area item-bg-3">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2><?= Yii::t('app', "Kontaktlar")?></h2>
                    <ul>
                        <li><a href="<?= \yii\helpers\Url::to(['/']) ?>"><?= Yii::t('app', "Bosh sahifa")?></a></li>
                        <li><?= Yii::t('app', "Kontaktlar")?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Contact Area -->
<section class="contact-area ptb-100">
    <div class="container">
        <?= Alert::widget() ?>
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="contact-info-box">
                    <div class="icon">
                        <i class='flaticon-email'></i>
                    </div>

                    <h3><?= $contact->title[Yii::$app->language] ?? $contact->title; ?></h3>
                    <p>
                        <a href="mailto:<?= \common\models\Contact::getContact("first_email")->value; ?>"><span
                                    class="__cf_email__"><?= $contact->value; ?></span></a>
                    </p>
                    <p><a href="mailto:<?= \common\models\Contact::getContact("second_email")->value; ?>"><span
                                    class="__cf_email__"><?= \common\models\Contact::getContact("second_email")->value; ?></span></a>
                    </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="contact-info-box">
                    <div class="icon">
                        <i class='flaticon-pin'></i>
                    </div>

                    <h3><?= \common\models\Contact::getContact("address")->title[Yii::$app->language] ?? ""; ?></h3>
                    <p> Namangan viloyati, <br><?= \common\models\Contact::getContact("address")->value; ?> </p>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
                <div class="contact-info-box">
                    <div class="icon">
                        <i class='flaticon-phone-call'></i>
                    </div>

                    <h3><?= \common\models\Contact::getContact("first_phone")->title[Yii::$app->language] ?? ""; ?></h3>
                    <p>
                        <a href="<?= \common\models\Contact::getContact("first_phone")->value; ?>"><?= \common\models\Contact::getContact("first_phone")->value; ?></a>
                    </p>
                    <p>
                        <a href="<?= \common\models\Contact::getContact("second_phone")->value; ?>"><?= \common\models\Contact::getContact("second_phone")->value; ?></a>
                    </p>
                </div>
            </div>
        </div>

        <div class="section-title">
            <span><?= Yii::t('app', "Biz bilan bog'laning")?></span>
            <h2><?= Yii::t('app', "Murojaatingizni qoldiring")?></h2>
        </div>
        <?php $form = ActiveForm::begin(); ?>
        <div class="contact-form">
            <form id="contact-form">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'placeholder' => 'Ism'])->label(false) ?>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'placeholder' => 'Familiya'])->label(false) ?>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true, 'placeholder' => 'Telefon raqam'])->label(false) ?>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Murojaat mavzusi'])->label(false) ?>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                            <?= $form->field($model, 'comment')->textarea(['rows' => 6, 'placeholder' => 'Murojaat matni'])->label(false) ?>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>

                    <div class="col-lg-12 col-md-12">
                        <?= Html::submitButton('Murojaatni jo\'natish', ['class' => 'default-btn']) ?>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</section>