<!--<div class="page-title-area item-bg-1">-->
<!--    <div class="d-table">-->
<!--        <div class="d-table-cell">-->
<!--            <div class="container">-->
<!--                <div class="page-title-content">-->
<!--                    <h2>About</h2>-->
<!--                    <ul>-->
<!--                        <li><a href="--><? //= \yii\helpers\Url::to(['/']) ?><!--">Home</a></li>-->
<!--                        <li>About</li>-->
<!--                    </ul>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- End Page Title Area -->

<?= \frontend\widgets\Banner::widget([
   'type' => \common\models\Banner::TYPE_ABOUT
]) ?>
<!-- Start About Area -->
<section class="about-area pt-100">
   <div class="container-fluid">
      <div class="row align-items-center">
         <div class="col-lg-6">
            <div class="about-image">
               <img src="/frontend-files/img/about-3.jpg" alt="image">
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
                                        <i class='flaticon-worm'></i>
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

<!-- Start Appointment Area -->
<section class="appointment-area ptb-100">
   <div class="container-fluid">
      <div class="row align-items-center">
         <div class="col-lg-12">
            <div class="row">
               <div class="col-lg-6">
                  <div class="single-fun-fact">
                     <h3>
                        <span class="odometer" data-count="270">00</span>
                        <span class="sign-icon">+</span>
                     </h3>
                     <p><?= Yii::t('app', 'Malakali shifokorlar')?></p>
                  </div>
               </div>

               <div class="col-lg-6 ">
                  <div class="single-fun-fact">
                     <h3>
                        <span class="odometer" data-count="2.7">00</span>
                        <span class="sign-icon">K</span>
                     </h3>
                     <p><?= Yii::t('app', 'Online foydalanuvchilar')?></p>
                  </div>
               </div>

               <div class="col-lg-6 ">
                  <div class="single-fun-fact">
                     <h3>
                        <span class="odometer" data-count="99.60">00</span>
                        <span class="sign-icon">%</span>
                     </h3>
                     <p><?= Yii::t('app', 'Yuqori sifat')?></p>
                  </div>
               </div>

               <div class="col-lg-6 ">
                  <div class="single-fun-fact">
                     <h3>
                        <span class="odometer" data-count="30">00</span>
                        <span class="sign-icon">+</span>
                     </h3>
                     <p><?= Yii::t('app', 'Yillik tajriba')?></p>
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
</section>
<!-- End Appointment Area -->

<!-- Start Partner Area -->
<section class="partner-area pt-100 pb-70">
    <div class="container">
        <div class="section-title">
            <span><?= Yii::t('app', 'Hamkorlar')?></span>
            <h2><?= Yii::t('app', 'Bizning hamkorlar')?></h2>
            <p><?= Yii::t('app', "Keng qamrovli va favqulodda sog'liqni saqlash xizmatlarini taqdim etish missiyamizda biz boshqa sog'liqni saqlash provayderlari, tashkilotlari va manfaatdor tomonlar bilan mustahkam hamkorlik o'rnatish muhimligini tan olamiz.")?></p>
        </div>

        <div class="partner-list">
            <div class="partner-item">
                <a href="partner.html">
                    <img src="/frontend-files/img/partner/1.jpg" alt="image">
                </a>
            </div>

            <div class="partner-item">
                <a href="partner.html">
                    <img src="/frontend-files/img/partner/2.jpg" alt="image">
                </a>
            </div>

            <div class="partner-item">
                <a href="partner.html">
                    <img src="/frontend-files/img/partner/3.jpg" alt="image">
                </a>
            </div>

            <div class="partner-item">
                <a href="partner.html">
                    <img src="/frontend-files/img/partner/4.jpg" alt="image">
                </a>
            </div>

            <div class="partner-item">
                <a href="partner.html">
                    <img src="/frontend-files/img/partner/5.jpg" alt="image">
                </a>
            </div>

            <div class="partner-item">
                <a href="partner.html">
                    <img src="/frontend-files/img/partner/5.jpg" alt="image">
                </a>
            </div>

            <div class="partner-item">
                <a href="partner.html">
                    <img src="/frontend-files/img/partner/6.jpg" alt="image">
                </a>
            </div>

            <div class="partner-item">
                <a href="partner.html">
                    <img src="/frontend-files/img/partner/7.jpg" alt="image">
                </a>
            </div>
        </div>
    </div>
</section>
<!-- End Partner Area -->

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
               <span><?= Yii::t('app', 'Onlayn konsultatsiya')?></span>
               <h3><?= Yii::t('app', 'Siz bilan 24/7 aloqadamiz')?></h3>
               <p><?= Yii::t('app', "Bizning shifoxonamiz bemorlarimizga qulay va qulay tibbiy xizmatlarni taqdim etishga intiladi. Bemor tajribasini oshirishga bag'ishlashimizning bir qismi sifatida biz eng zamonaviy onlayn maslahat vositalarini taklif etamiz.")?></p>

               <ul class="list">
                  <li>
                     <i class="flaticon-check-1"></i>
                      <?= Yii::t('app', 'Online uchrashuvlar')?>
                  </li>
                  <li>
                     <i class="flaticon-check-1"></i>
                      <?= Yii::t('app', 'Xavfsiz va maxfiy')?>
                  </li>
                  <li>
                     <i class="flaticon-check-1"></i>
                      <?= Yii::t('app', 'Elektron retseptlar')?>
                  </li>
                  <li>
                     <i class="flaticon-check-1"></i>
                      <?= Yii::t('app', 'Raqamli tibbiy hisobotlar')?>
                  </li>
                  <li>
                     <i class="flaticon-check-1"></i>
                      <?= Yii::t('app', 'Foydalanish imkoniyati va qulaylik')?>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- End Consult Area -->

