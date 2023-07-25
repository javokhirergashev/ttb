<?php

//$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;

?>
<!-- Start About Area -->
<section class="about-area ptb-100">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="about-image">
                    <img  src="/frontend-files/img/about-2.png" alt="image">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="about-content">
                    <span><?= Yii::t('app', 'Biz haqimizda')?></span>
                    <h3><?= Yii::t('app', 'Shifoxonamizga xush kelibsiz ')?></h3>
                    <p><?= Yii::t('app', 'Shifoxonamizga xush kelibsiz, bu yerda sog`ligingiz bizning ustuvor vazifamizdir. Biz sizning tibbiy ehtiyojlaringiz uchun to`g`ri shifoxonani tanlash juda muhim qaror ekanligini tushunamiz va nima uchun biz sizning ishonchli tibbiy xizmat ko`rsatuvchi provayderingiz bo`lishimiz kerakligini ko`rsatish uchun shu yerdamiz.')?></p>

                    <ul class="about-features two">
                        <li>
                                    <span>
                                        <i class='flaticon-doctor'></i>
                                        <?= Yii::t('app', 'Umumiy shifokor')?>
                                    </span>
                        </li>
                        <li>
                                    <span>
                                        <i class='flaticon-patient'></i>
                                       <?= Yii::t('app', 'Sifatli xizmat ko`rsatish')?>
                                    </span>
                        </li>
                        <li>
                                    <span>
                                        <i class='flaticon-cough'></i>
                                       <?= Yii::t('app', 'Bolalar shifokori')?>
                                    </span>
                        </li>
                        <li>
                                    <span>
                                        <i class='flaticon-blood-test'></i>
                                        <?= Yii::t('app', 'Tezkor tahlil natijasi')?>
                                    </span>
                        </li>
                        <li>
                                    <span>
                                        <i class='flaticon-family'></i>
                                        <?= Yii::t('app', 'Oilaviy poliklinika')?>
                                    </span>
                        </li>
                        <li>
                                    <span>
                                        <i class='flaticon-insurance'></i>
                                        <?= Yii::t('app', 'Tezkor ro`yxatga olish')?>
                                    </span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End About Area -->