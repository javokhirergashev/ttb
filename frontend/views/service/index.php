<?php

use common\models\User;
use kartik\datetime\DateTimePicker;
use yii\widgets\ActiveForm;


/** @var yii\web\View $this */
/** @var common\models\Queue $model */
/** @var yii\widgets\ActiveForm $form */

/**
 * @var $dataProvider \yii\data\ActiveDataProvider
 */

?>
<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Bu vaqtlar band qilingan. Iltimos boshqa vaqt
                    tanlang</h5>
                <button type="button" class="btn-close close-time-modal" data-bs-dismiss="modal"
                        aria-label="Close"></button>
            </div>


            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-time-modal" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--<div class="page-title-area item-bg-6">-->
<!--    <div class="d-table">-->
<!--        <div class="d-table-cell">-->
<!--            <div class="container">-->
<!--                <div class="page-title-content">-->
<!--                    <h2>Services</h2>-->
<!--                    <ul>-->
<!--                        <li><a href="--><?//= \yii\helpers\Url::to(['/']) ?><!--">--><?//= __('Home') ?><!--</a></li>-->
<!--                        <li>--><?//= __('Services') ?><!--</li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- End Page Title Area -->
<?= \frontend\widgets\Banner::widget([
    'type' => \common\models\Banner::TYPE_SERVICE
]) ?>
<!-- Start Services Area -->
<section class="services-section bg-f4f6fe pt-100 pb-100">
    <div class="container">
        <div class="section-title">
            <span><?= __('Our Services') ?></span>
            <h2><?= __('Our Healthcare Services') ?></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Quis ipsum suspendisse</p>
        </div>
        <?= \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_list_item',
            'options' => ['class' => 'row'],
            'itemOptions' => ['class' => 'col-lg-4 col-md-6'],
            'layout' => '{items}'
        ]) ?>
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="pagination-area">
                    <a href="#" class="prev page-numbers">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                    <a href="#" class="page-numbers">1</a>
                    <span class="page-numbers current" aria-current="page">2</span>
                    <a href="#" class="page-numbers">3</a>
                    <a href="#" class="page-numbers">4</a>
                    <a href="#" class="next page-numbers">
                        <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Services Area -->

<!-- Start Appointment Area -->
<section class="appointment-area ptb-100">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-fun-fact">
                            <h3>
                                <span class="odometer" data-count="2700">00</span>
                                <span class="sign-icon">+</span>
                            </h3>
                            <p>Care Locations</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="single-fun-fact">
                            <h3>
                                <span class="odometer" data-count="2.7">00</span>
                                <span class="sign-icon">K</span>
                            </h3>
                            <p>Virtual Care Solutions</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="single-fun-fact">
                            <h3>
                                <span class="odometer" data-count="99.60">00</span>
                                <span class="sign-icon">%</span>
                            </h3>
                            <p>Connections Success Rate</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6">
                        <div class="single-fun-fact">
                            <h3>
                                <span class="odometer" data-count="30">00</span>
                                <span class="sign-icon">+</span>
                            </h3>
                            <p>Award Winning</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">

                <div class="appointment-form queue-form">
                    <div class="content">
                        <span>Call to Action</span>
                        <h3>Make An Appointment</h3>
                    </div>
                    <?php $form = ActiveForm::begin(['method' => 'POST', 'action' => \yii\helpers\Url::to(['queue/create'])], ['options' => ['id' => 'queue-form']]); ?>
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <?= $form->field($model, 'first_name')->textInput(['maxlength' => true, 'placeholder' => 'Ism', 'template' => '
                       <div class="form-group">
                             {input}
      
                             <div class="help-block">{hint}</div>
                             <div class="error-block">{error}</div>
                       </div>'])->hint('<i class="flaticon-user"></i>')->label(false)
                            ?>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <?= $form->field($model, 'last_name')->textInput(['maxlength' => true, 'placeholder' => 'Familiya', 'template' => '
                       <div class="form-group">
                             {input}
      
                             <div class="help-block">{hint}</div>
                             <div class="error-block">{error}</div>
                       </div>'])->hint('<i class="flaticon-user"></i>')->label(false)
                            ?>
                        </div>

                        <div class="col-lg-6 col-sm-6">
                            <div class="form-group">
                                <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true, 'placeholder' => 'Telefon raqami'])->label(false) ?>
                                <i class="flaticon-call"></i>

                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <?= $form->field($model, 'user_id')->dropDownList(User::getDropDownList(), [
                                'prompt' => 'Shifokorni tanlang',
                                'options' => [
                                ],
                                'inputOptions' => [
                                ]
                            ])->label(false) ?>
                        </div>
                        <div class="col-lg-12 col-sm-12 mb-3">
                            <?php

                            echo DateTimePicker::widget([
                                'id' => 'my-datetime-picker',
                                'name' => 'Queue[writing_time]',
                                'options' => ['placeholder' => 'Select date and time...'],
                                'convertFormat' => true,
                                'pluginOptions' => [
                                    'style' => 'margin-bottom:22px',
                                    'format' => 'yyyy-MM-dd HH:i',
                                    'todayHighlight' => true,
                                    'autoclose' => true,
                                    'startDate' => date('Y-m-d H:i', strtotime(date('Y-m-d H:i',) . '+5 hour')),
                                    'endDate' => '2023-06-30',
                                    'minuteStep' => 20,
                                    'removeButton' => true,
                                    'clearBtn' => false,
                                    'disabledMinutes' => [0, 15, 30, 45], // Array of disabled minutes
                                ],
                            ]);
                            ?>
                        </div>


                        <div class="col-lg-12 col-sm-12">
                            <div class="form-group">
                                <?= $form->field($model, 'reason')->textarea(['maxlength' => true, 'placeholder' => 'Bemor shikoyati'])->label(false) ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="appointment-btn">
                                <?php echo \yii\helpers\Html::submitButton(__('Navbatga yozilish'), ['class' => 'default-btn']) ?>
                            </div>
                        </div>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Appointment Area -->

<!-- Start Consult Area -->
<section class="consult-area ptb-100">
    <div class="container-fluid pl-0">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="consult-image">
                    <img src="/frontend-files/img/consult.jpg" alt="image">
                </div>
            </div>

            <div class="col-lg-5">
                <div class="consult-content">
                    <span>Online Consult</span>
                    <h3>Get 24/7 Care Right From Your Phone</h3>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy</p>

                    <ul class="list">
                        <li>
                            <i class="flaticon-check-1"></i>
                            Get unlimited 24/7 Video Chat with a provider at no extra cost
                        </li>
                        <li>
                            <i class="flaticon-check-1"></i>
                            Easily book appointments and renew prescriptions
                        </li>
                        <li>
                            <i class="flaticon-check-1"></i>
                            Skip unnecessary trips to the ER or urgent care
                        </li>
                        <li>
                            <i class="flaticon-check-1"></i>
                            Have a Remote Visit with your primary care provider over video
                        </li>
                        <li>
                            <i class="flaticon-check-1"></i>
                            Message with your provider
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Consult Area -->
