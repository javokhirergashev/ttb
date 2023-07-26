<!-- Start Footer Area -->
<section class="footer-area pt-100 pb-70">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <h3>Tinzer</h3>
                    <p><?= Yii::t('app', "Bizning vazifamiz har tomonlama va shaxsiylashtirilgan tibbiy xizmatlar orqali odamlar va oilalar salomatligi va hayot sifatini yaxshilashdir. ")?></p>
                    <ul class="footer-social">
                        <li>
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget pl-5">
                    <h3><?= Yii::t('app', "Bo'limlar")?></h3>

                    <ul class="footer-quick-links">
                        <li>
                            <a href="#">COVID-19 Testing</a>
                        </li>
                        <li>
                            <a href="#">Birth Control</a>
                        </li>
                        <li>
                            <a href="#">Orthopedics</a>
                        </li>
                        <li>
                            <a href="#">Nuclear Magnetic</a>
                        </li>
                        <li>
                            <a href="#">Eye Treatment</a>
                        </li>
                        <li>
                            <a href="#">X-Ray</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget pl-5">
                    <h3><?= Yii::t('app', "Tezkor havolalar")?></h3>

                    <ul class="footer-quick-links">
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['/']) ?>">Home</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['site/about']) ?>">About</a>
                        </li>

                        <li>
                            <a href="<?= \yii\helpers\Url::to(['service/index']) ?>">Services</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['blog/index']) ?>">Blog</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['site/contact']) ?>">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="single-footer-widget">
                    <h3><?= Yii::t('app', 'Bog`lanish')?></h3>

                    <div class="footer-info-contact">
                        <i class="flaticon-call"></i>
                        <h3><?= Yii::t('app', 'Telefon raqam')?></h3>
                        <span><a href="tel:<?= \common\models\Contact::getContact("first_phone")->value; ?>"><?= \common\models\Contact::getContact("first_phone")->value; ?></a></span>
                    </div>

                    <div class="footer-info-contact">
                        <i class="flaticon-email"></i>
                        <h3><?= Yii::t('app', 'Elektron pochta')?></h3>
                        <span><a href="<?= \common\models\Contact::getContact("first_email")->value; ?>"><span class="__cf_email__" ><?= \common\models\Contact::getContact("first_email")->value; ?></span></a></span>
                    </div>

                    <div class="footer-info-contact">
                        <i class="flaticon-pin"></i>
                        <h3><?= Yii::t('app', 'Manzil')?></h3>
                        <span><?= \common\models\Contact::getContact("first_address")->value; ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>

    <div class="shape">
        <img  src="/frontend-files/img/footer-shape.png" alt="image">
    </div>
</section>
<!-- End Footer Area -->

<!-- Start Copy Right Section -->
<div class="copyright-area">
    <div class="container">
        <p>
            Copyright © <script data-cfasync="false" src="/frontend-files/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear())</script> All Rights Reserved by
            <a href="" target="_blank">
                Webspace
            </a>
        </p>
    </div>
</div>
<!-- End Copy Right Section -->

<!-- Start Go Top Area -->
<div class="go-top">
    <i class="fa fa-chevron-up"></i>
    <i class="fa fa-chevron-up"></i>
</div>
<!-- End Go Top Area -->

<!-- dark version -->
<div class="dark-version">
    <label id="switch" class="switch">
        <input type="checkbox" onchange="toggleTheme()" id="slider">
        <span class="slider round"></span>
    </label>
</div>
<!-- dark version -->