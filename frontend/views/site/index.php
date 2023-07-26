<?php
/**
 * @var $services \common\models\Service[]
 */
/** @var yii\web\View $this */
/** @var $doctors \common\models\User[] */

$this->title = 'TTB';
$page = 1;
?>
<?= \frontend\widgets\Banner::widget([
    'type' => \common\models\Banner::TYPE_HOME
]) ?>
<?= \frontend\widgets\About::widget() ?>
<section class="services-section bg-f4f6fe pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span><?= Yii::t('app', 'Bizning xizmatlar') ?></span>
            <h2><?= Yii::t('app', 'Bizning sog`liqni saqlash xizmatlarimiz') ?></h2>
            <p><?= Yii::t('app', 'Bizning keng qamrovli xizmatlarimiz profilaktika yordami, diagnostika muolajalari, ilg`or muolajalar va ixtisoslashtirilgan davolash usullarini o`z ichiga oladi va bu sizning barcha sog`liqni saqlash ehtiyojlaringiz bir tom ostida qondirilishini ta`minlaydi.') ?></p>
        </div>
        <?php if (count($services) > 0): ?>
            <div class="row">
                <?php foreach ($services as $index => $service): ?>

                    <div class="col-lg-4 col-md-6">
                        <div class="services-item-two">
                            <div class="icon">
                                <i class="flaticon-bacteria"></i>
                            </div>
                            <a href="<?= \yii\helpers\Url::to(['service/view', 'id' => $service->id]) ?>">
                                <h3><?= $service->getPrettyTitle() ?></h3>
                            </a>
                            <p><?= $service->getPrettyDescription() ?></p>
                            <a href="<?= \yii\helpers\Url::to(['service/view', 'id' => $service->id]) ?>"
                               class="read-btn"><?= __('Read more') ?> +</a>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="services-item-two">
                        <div class="icon">
                            <i class="flaticon-bacteria"></i>
                        </div>
                        <a href="">
                            <h3><?= Yii::t('app', 'Infeksiologiya') ?></h3>
                        </a>
                        <p><?= Yii::t('app', "Yuqumli kasalliklar bo'limi bakteriyalar, viruslar, zamburug'lar va parazitlar kabi mikroorganizmlar keltirib chiqaradigan kasalliklarning oldini olish, tashxislash va davolashga qaratilgan. Ushbu bo'lim yuqumli kasalliklar tarqalishini boshqarish va nazorat qilishda hal qiluvchi rol o'ynaydi.") ?></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="services-item-two">
                        <div class="icon">
                            <i class="flaticon-shield"></i>
                        </div>
                        <a href="">
                            <h3><?= Yii::t('app', 'Tez tibbiy yordam') ?></h3>
                        </a>
                        <p><?= Yii::t('app', "Shoshilinch tibbiy yordam bo'limi o'tkir kasalliklar, jarohatlar va tibbiy favqulodda vaziyatlarda zudlik bilan tibbiy yordam ko'rsatadi. U 24/7 ishlaydi va ko'plab shoshilinch tibbiy sharoitlarni ko'rib chiqish uchun jihozlangan.") ?></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="services-item-two">
                        <div class="icon">
                            <i class="flaticon-beauty-treatment"></i>
                        </div>
                        <a href="">
                            <h3><?= Yii::t('app', 'Dermatologiya') ?></h3>
                        </a>
                        <p><?= Yii::t('app', 'Dermatologiya bo`limi teri, soch va tirnoqlar bilan bog`liq kasalliklarni tashxislash va davolash bilan shug`ullanadi. U teri infektsiyalari, allergiya, dermatit, akne va teri saratoni kabi ko`plab muammolarni qamrab oladi.') ?></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="services-item-two">
                        <div class="icon">
                            <i class="flaticon-mental-health"></i>
                        </div>
                        <a href="">
                            <h3><?= Yii::t('app', 'Nevrologiya') ?></h3>
                        </a>
                        <p><?= Yii::t('app', 'Nevrologiya bo`limi asab tizimining, jumladan, miya, orqa miya va periferik nervlarning buzilishlari bilan shug`ullanadi. U insult, epilepsiya, Parkinson kasalligi va ko`p skleroz kabi kasalliklarni tashxislash va boshqarishga qaratilgan.') ?></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="services-item-two">
                        <div class="icon">
                            <i class="flaticon-crutches"></i>
                        </div>
                        <a href="">
                            <h3><?= Yii::t('app', 'Ortopediya') ?></h3>
                        </a>
                        <p><?= Yii::t('app', 'Ortopediya bo`limi suyak sinishi, bo`g`imlarning buzilishi, sport jarohatlari va degenerativ kasalliklarni o`z ichiga olgan tayanch-harakat tizimi kasalliklarini tashxislash va davolashga ixtisoslashgan.') ?></p>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="services-item-two">
                        <div class="icon">
                            <i class="flaticon-pregnancy"></i>
                        </div>
                        <a href="">
                            <h3><?= Yii::t('app', 'Akusherlik va ginekologiya') ?></h3>
                        </a>
                        <p><?= Yii::t('app', "Akusherlik va ginekologiya: Akusherlik va ginekologiya bo‘limi ayollarga har tomonlama yordam ko‘rsatadi, jumladan, prenatal parvarish, tug‘ruq, reproduktiv salomatlik, oilani rejalashtirish, ginekologik kasalliklarni davolash.") ?></p>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- End Services Area -->

<!-- Start Doctor Area -->
<section class="doctor-area pt-100 pb-70">
    <div class="container-fluid">
        <div class="section-title">
            <div class="section-title">
                <span><?= Yii::t('app', 'Xodimlar') ?></span>
                <h2><?= Yii::t('app', 'Bizning malakali shifokorlarimiz') ?></h2>
                <p><?= Yii::t('app', "Shifoxonamizdagi yuqori malakali va fidoyi shifokorlarimiz jamoasi har bir bemorga alohida tibbiy yordam ko'rsatish va shaxsiy e'tiborni taqdim etishga intiladi. Turli mutaxassisliklar va boy tajribaga ega bo'lgan shifokorlarimiz eng yuqori sifatli tibbiy xizmatlarni taqdim etishga ishtiyoqlidir.") ?></p>
            </div>
        </div>

        <div class="row">
            <?php foreach ($doctors as $doctor): ?>
                <?php
                $doctor_image = \common\models\StaticFunctions::getImage('user', $doctor->id, $doctor->avatar)
                ?>
                <div class="col-lg-3 col-md-6">
                    <div class="doctor-item">
                        <div class="image">
                            <img src="<?= $doctor_image ?>" alt="image">
                        </div>
                        <div class="content">
                            <h3><?= $doctor->first_name . " " . $doctor->last_name ?></h3>
                            <span><?= $doctor->position->title[Yii::$app->language] ?></span>


                            <ul class="social">
                                <li>
                                  <a href="<?= $doctor->telegram_link ?>" target="_blank">
                                        <i class="fab fa-telegram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $doctor->facebook_link ?>" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $doctor->instagram_link ?>" target="_blank">
                                        <i class="fab fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="<?= $doctor->twitter_link ?>" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End Doctor Area -->

<!-- Start Goal Area -->
<section class="goal-area pb-100">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="goal-image">
                    <img src="/frontend-files/img/goal.jpg" alt="image">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="goal-content-item">
                    <div class="item-content">
                        <span></span>
                        <h3><?= Yii::t('app', 'Bizning asosiy maqsadimiz') ?></h3>
                        <p><?= Yii::t('app', "Shifoxonamizda bizning maqsadlarimiz alohida tibbiy xizmatlar ko'rsatish va bemorlarimizning umumiy farovonligini yaxshilashga qaratilgan. Mana bizning asosiy maqsadlarimiz:") ?></p>

                        <ul class="list">
                            <li>
                                <?= Yii::t('app', "Yuqori sifatli yordam ko'rsatish: Bizning asosiy maqsadimiz bemorlarimizga eng yuqori standartdagi yordamni taqdim etishdir.") ?>
                            </li>
                            <li>
                                <?= Yii::t('app', "Bemorga yo'naltirilgan yondashuv: Biz bemorlarimizni hamma narsada birinchi o'ringa qo'yishga intilamiz.") ?>
                            </li>
                            <li>
                                <?= Yii::t('app', "Innovatsiyalar va texnologiyalarni qamrab olish: Biz tibbiy yutuqlar va texnologik innovatsiyalarning oldingi saflarida qolishga intilamiz.") ?>
                            </li>
                            <li>
                                <?= Yii::t('app', "Doimiy takomillashtirish: Biz doimiy takomillashtirish madaniyatiga sodiqmiz. Bizning maqsadimiz o'z faoliyatini muntazam ravishda baholashdir") ?>
                            </li>
                        </ul>
                        <div class="goal-btn">
                            <span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Goal Area -->

<!-- Start Shop Area -->
<section class="shop-area pb-70">
    <div class="container-fluid">
        <div class="section-title">
            <div class="section-title">
                <span><?= Yii::t('app', 'Xizmatlar') ?></span>
                <h2><?= Yii::t('app', 'Bizning pullik xizmatlar') ?></h2>
                <p><?= Yii::t('app', "Bizning keng qamrovli sog'liqni saqlash xizmatlarimizdan tashqari, tibbiyot birlashma muayyan ehtiyoj va imtiyozlarni qondirish uchun mo'ljallangan yuqori darajadagi pullik xizmatlar tanlovini taklif etadi. Ushbu pullik xizmatlar kengaytirilgan qulaylik, shaxsiy parvarish va qo'shimcha qulayliklarni ta'minlash uchun mo'ljallangan.") ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="single-shop">
                    <div class="product-image">
                        <a href="single-product.html">
                            <img src="/frontend-files/img/shop/image1.jpg" alt="image">
                        </a>

                        <div class="percentage">
                            -40%
                        </div>

                        <ul class="add-to-cart-btn">
                            <li>
                                <a href="#">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-content">
                        <h3>
                            <a href="single-product.html">
                                Medical Mask
                            </a>
                        </h3>
                        <span>Datsun</span>
                        <div class="bar"></div>
                        <ul class="rating">
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li class="rating1">
                                <i class="fas fa-star"></i>
                            </li>
                        </ul>
                        <b>$140.00</b>
                        <a href="cart.html" class="cart-icon">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-shop">
                    <div class="product-image">
                        <a href="single-product.html">
                            <img src="/frontend-files/img/shop/image2.jpg" alt="image">
                        </a>

                        <ul class="add-to-cart-btn">
                            <li>
                                <a href="#">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-content">
                        <h3>
                            <a href="single-product.html">
                                Hand Sanitizer
                            </a>
                        </h3>
                        <span>Datsun</span>
                        <div class="bar"></div>
                        <ul class="rating">
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li class="rating1">
                                <i class="fas fa-star"></i>
                            </li>
                        </ul>
                        <b>$290.00</b>
                        <a href="cart.html" class="cart-icon">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-shop">
                    <div class="product-image">
                        <a href="single-product.html">
                            <img src="/frontend-files/img/shop/image3.jpg" alt="image">
                        </a>

                        <div class="percentage">
                            -40%
                        </div>

                        <ul class="add-to-cart-btn">
                            <li>
                                <a href="#">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-content">
                        <h3>
                            <a href="single-product.html">
                                Drugs
                            </a>
                        </h3>
                        <span>Datsun</span>
                        <div class="bar"></div>
                        <ul class="rating">
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li class="rating1">
                                <i class="fas fa-star"></i>
                            </li>
                        </ul>
                        <b>$110.00</b>
                        <a href="cart.html" class="cart-icon">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="single-shop">
                    <div class="product-image">
                        <a href="single-product.html">
                            <img src="/frontend-files/img/shop/image4.jpg" alt="image">
                        </a>

                        <div class="percentage">
                            -40%
                        </div>

                        <ul class="add-to-cart-btn">
                            <li>
                                <a href="#">
                                    <i class="fa fa-search"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="product-content">
                        <h3>
                            <a href="single-product.html">
                                Medical Gloves
                            </a>
                        </h3>
                        <span>Datsun</span>
                        <div class="bar"></div>
                        <ul class="rating">
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li>
                                <i class="fas fa-star"></i>
                            </li>
                            <li class="rating1">
                                <i class="fas fa-star"></i>
                            </li>
                        </ul>
                        <b>$220.00</b>
                        <a href="cart.html" class="cart-icon">
                            <i class="fa fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Area -->

<!-- Start Projects Area -->
<section class="projects-area pt-100 pb-70">
    <div class="container-fluid">
        <div class="section-title">
            <span><?= Yii::t('app', "Yangiliklar") ?></span>
            <h2><?= Yii::t('app', "Eng so'nngi yangliklar") ?></h2>
            <p><?= Yii::t('app', "Shifoxonamizdan soʻnggi yangiliklar va yangilanishlardan xabardor boʻling. Bizning yangiliklar bo'limimiz yangi xizmatlar, tibbiy yutuqlar, jamoat tadbirlari va muhim e'lonlar haqida qimmatli ma'lumotlarni taqdim etadi.") ?></p>
        </div>

      <div class="row">
            <?php foreach ($news as $news_blog) : ?>
            <?php $news_image = \common\models\StaticFunctions::getImage('news',$news_blog->id,$news_blog->main_image)?>
                <div class="col-lg-4 col-md-6">
                    <div class="projects-item">
                        <div class="image">
                            <a href="single-projects.html">
                                <img src="<?= $news_image ?>" alt="image">
                            </a>
                        </div>
                        <div class="content">
                            <p>
                                <a href="single-projects.html">
                                    <?= $news_blog->title[Yii::$app->language] ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<!-- End Projects Area -->

<!-- Start Testimonials Area -->
<section class="testimonials-area ptb-100">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="testimonials-image">
                    <div class="image">
                        <img src="/frontend-files/img/testimonials.jpg" alt="image">
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="testimonials-slider owl-carousel owl-theme">

                    <?php foreach ($comments as $comment) : ?>
                    <?php $comment_img = \common\models\StaticFunctions::getImage('commnents',$comment->id,$comment->image)?>
                        <div class="testimonials-item">
                            <div class="content">
                                <span><?= Yii::t('app', 'Mijozlarimiz fikrlari') ?></span>
                                <h3><?= Yii::t('app', 'Mijozlarimiz biz haqimizda qanday fikrda?') ?></h3>
                                <div class="icon">
                                    <i class="flaticon-left-quote"></i>
                                </div>
                                <p><?=$comment->comment?></p>

                                <div class="info">
                                    <img src="<?=$comment_img?>" alt="image">
                                    <h4><?=$comment->client_full_name?></h4>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Testimonials Area -->

<!-- Start Partner Area -->
<section class="partner-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span><?= Yii::t('app', 'Hamkorlar') ?></span>
            <h2><?= Yii::t('app', 'Bizning hamkorlar') ?></h2>
            <p><?= Yii::t('app', "Keng qamrovli va favqulodda sog'liqni saqlash xizmatlarini taqdim etish missiyamizda biz boshqa sog'liqni saqlash provayderlari, tashkilotlari va manfaatdor tomonlar bilan mustahkam hamkorlik o'rnatish muhimligini tan olamiz.") ?></p>
        </div>

        <div class="partner-list">

            <?php foreach ($partners as $partner) : ?>
             <?php $partner_image = \common\models\StaticFunctions::getImage('partners',$partner->id,$partner->image)?>
                <div class="partner-item">
                    <a href="partner.html">
                        <img src="<?=$partner_image?>" alt="image">
                        <img src="<?=$partner_image?>" alt="image">
                    </a>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
<!-- End Partner Area -->

<!-- Start Blog Area -->
<!-- End Blog Area -->

