<div class="sidebar" id="sidebar">
   <div class="sidebar-inner slimscroll">
      <div id="sidebar-menu" class="sidebar-menu">
         <ul>
            <li>
               <a href="<?= \yii\helpers\Url::to(['site/index']) ?>"><span class="menu-side"><img
                        src="/backend-files/img/icons/menu-icon-01.svg" alt=""></span> <span> Bosh sahifa </span></a>
            </li>
            <li>
               <a href="<?= \yii\helpers\Url::to(['user/']) ?>"><span class="menu-side"><img
                        src="/backend-files/img/icons/menu-icon-03.svg" alt=""></span> <span> Xodimlar </span></a>
            </li>
            <li>
               <a href="<?= \yii\helpers\Url::to(['position/']) ?>"><span class="menu-side"><img
                        src="/backend-files/img/icons/menu-icon-06.svg" alt=""></span> <span> Lavozimlar </span></a>
            </li>
             <li>
                 <a href="<?= \yii\helpers\Url::to(['people/']) ?>"><span class="menu-side"><img
                                 src="/backend-files/img/icons/menu-icon-02.svg" alt=""></span> <span> Aholi ro'yxati </span></a>
             </li>
            <li>
               <a href="<?= \yii\helpers\Url::to(['category/']) ?>"><span class="menu-side"><img
                        src="/backend-files/img/icons/menu-icon-13.svg" alt=""></span> <span> Kategoriyalar </span></a>
            </li>
            <li>
               <a href="<?= \yii\helpers\Url::to(['service/']) ?>"><span class="menu-side"><img
                        src="/backend-files/img/icons/menu-icon-15.svg" alt=""></span> <span> Xizmatlar </span></a>
            </li>
            <li>
               <a href="<?= \yii\helpers\Url::to(['news/']) ?>"><span class="menu-side"><img
                        src="/backend-files/img/icons/menu-icon-05.svg" alt=""></span> <span> Yangiliklar </span></a>
            </li>
            <li>
               <a href="<?= \yii\helpers\Url::to(['request/']) ?>"><span class="menu-side"><img
                        src="/backend-files/img/icons/menu-icon-12.svg" alt=""></span> <span> Murojaatlar </span></a>
            </li>
            <li>
               <a href="<?= \yii\helpers\Url::to(['queue/']) ?>"><span class="menu-side"><img
                        src="/backend-files/img/icons/menu-icon-14.svg" alt=""></span> <span> Navbatlar </span></a>
            </li>
            <li>
               <a href="<?= \yii\helpers\Url::to(['qvp/index']) ?>"><span class="menu-side"><img
                        src="/backend-files/img/icons/menu-icon-14.svg" alt=""></span> <span> Qvp </span></a>
            </li>
             <li>
                 <a href="<?= \yii\helpers\Url::to(['terriytory/index']) ?>"><span class="menu-side"><img src="/backend-files/img/icons/menu-icon-14.svg" alt=""></span> <span> Teritoriya </span></a>
             </li>
             <li class="submenu">
                 <a href="#"><span class="menu-side"><img src="/backend-files/img/icons/menu-icon-15.svg" alt=""></span>
                     <span>Tashxislar to'plami</span> <span class="menu-arrow"></span></a>
                 <ul style="display: none;">
                     <li><a href="<?= \yii\helpers\Url::to(['diagnosis-class/']) ?>">Tashxislar sinfi</a></li>
                     <li><a href="<?= \yii\helpers\Url::to(['diagnosis-group/']) ?>">Tashxislar guruhi</a></li>
                     <li><a href="<?= \yii\helpers\Url::to(['diagnosis-list/']) ?>">Tashxislar ro'yxati</a></li>
                 </ul>
             </li>
            <li class="submenu">
               <a href="#"><span class="menu-side"><img src="/backend-files/img/icons/menu-icon-16.svg" alt=""></span>
                  <span>Sayt sozlamalari</span> <span class="menu-arrow"></span></a>
               <ul style="display: none;">
                  <li><a href="<?= \yii\helpers\Url::to(['menu/']) ?>">Menyular</a></li>
                  <li><a href="<?= \yii\helpers\Url::to(['banner/']) ?>">Bannerlar</a></li>
               </ul>
            </li>
            <li>
               <a href="<?= \yii\helpers\Url::to(['contact/']) ?>"><span class="menu-side"><img
                        src="/backend-files/img/icons/menu-icon-11.svg" alt=""></span> <span> Kontaktlar </span></a>
            </li>
            <li>
               <a href="<?= \yii\helpers\Url::to(['site/map']) ?>"><span class="menu-side"><img
                        src="/backend-files/img/icons/menu-icon-08.svg" alt=""></span> <span> Kartada ko'rish</span></a>
            </li>
             <li>
                 <a href="<?= \yii\helpers\Url::to(['partners/']) ?>"><span class="menu-side"><img
                                 src="/backend-files/img/icons/menu-icon-09.svg" alt=""></span> <span> Hamkorlar</span></a>
             </li>
         </ul>
         <div class="logout-btn">
            <a data-method="post" href="<?= \yii\helpers\Url::to(['site/logout']) ?>"><span class="menu-side"><img
                     src="/backend-files/img/icons/logout.svg" alt=""></span> <span>Logout</span></a>
         </div>
      </div>
   </div>
</div>