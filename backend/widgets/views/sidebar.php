<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="<?= \yii\helpers\Url::to(['site/index']) ?>"><span class="menu-side"><img   src="/backend-files/img/icons/menu-icon-01.svg" alt=""></span> <span> Bosh sahifa </span></a>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img   src="/backend-files/img/icons/menu-icon-03.svg" alt=""></span> <span>Xodimlar bo'limi</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="<?= \yii\helpers\Url::to(['user/']) ?>">Xodimlar ro'yxati</a></li>
                        <li><a href="<?= \yii\helpers\Url::to(['user/create']) ?>">Yangi xodim qo'shish</a></li>
                        <li><a href="<?= \yii\helpers\Url::to(['position/']) ?>">Lavozimlar</a></li>
                        <li><a href="<?= \yii\helpers\Url::to(['position/create']) ?>">Yangi lavozim qo'shish</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img   src="/backend-files/img/icons/menu-icon-06.svg" alt=""></span> <span>Bo'limlar</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="<?= \yii\helpers\Url::to(['department/']) ?>">Bo'limlar ro'yxati</a></li>
                        <li><a href="<?= \yii\helpers\Url::to(['department/create']) ?>">Yangi bo'lim qo'shish</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img   src="/backend-files/img/icons/menu-icon-09.svg" alt=""></span> <span>Menyular </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="<?= \yii\helpers\Url::to(['menu/']) ?>">Menyular ro'yxati</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img   src="/backend-files/img/icons/menu-icon-05.svg" alt=""></span> <span>Xizmatlar </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="<?= \yii\helpers\Url::to(['service/']) ?>">Xizmatlar ro'yxati</a></li>
                        <li><a href="<?= \yii\helpers\Url::to(['service/create']) ?>">Yangi xizmat qo'shish</a></li>
                        <li><a href="<?= \yii\helpers\Url::to(['category/']) ?>">Xizmatlar kategoriyasi</a></li>
                        <li><a href="<?= \yii\helpers\Url::to(['category/create']) ?>">Yangi kategoriya qo'shish</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img   src="/backend-files/img/icons/menu-icon-02.svg" alt=""></span> <span>Topshiriqlar </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="<?= \yii\helpers\Url::to(['task/']) ?>">Topshiriqlar ro'yxati</a></li>
                        <li><a href="<?= \yii\helpers\Url::to(['task/create']) ?>">Yangi Topshiriq qo'shish</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img   src="/backend-files/img/icons/menu-icon-07.svg" alt=""></span> <span>To'lovlar </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="<?= \yii\helpers\Url::to(['payments/']) ?>">To'lovlar ro'yxati</a></li>
                        <li><a href="<?= \yii\helpers\Url::to(['payments/create']) ?>">Yangi Topshiriq qo'shish</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img   src="/backend-files/img/icons/menu-icon-13.svg" alt=""></span> <span>Yangiliklar </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="<?= \yii\helpers\Url::to(['news/']) ?>">Yangiliklar ro'yxati</a></li>
                        <li><a href="<?= \yii\helpers\Url::to(['news/create']) ?>">Yangi yangilik qo'shish</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img   src="/backend-files/img/icons/menu-icon-15.svg" alt=""></span> <span>Savol-javob </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="<?= \yii\helpers\Url::to(['faq/']) ?>">Savol-Javoblar</a></li>
                        <li><a href="<?= \yii\helpers\Url::to(['faq/create']) ?>">Yangi qo'shish</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img   src="/backend-files/img/icons/menu-icon-15.svg" alt=""></span> <span>Vakansiyalar </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="<?= \yii\helpers\Url::to(['vacancy/']) ?>">Vakansiyalar ro'yhati</a></li>
                        <li><a href="<?= \yii\helpers\Url::to(['vacancy/create']) ?>">Yangi vakansiya qo'shish</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img   src="/backend-files/img/icons/menu-icon-12.svg" alt=""></span> <span>Ogohlantirishlar </span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a href="<?= \yii\helpers\Url::to(['messages/']) ?>">Ogohlantirishlar ro'yxati</a></li>
                        <li><a href="<?= \yii\helpers\Url::to(['messages/create']) ?>">Yangi ogohlantirish qo'shish</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?= \yii\helpers\Url::to(['contacts/']) ?>"><span class="menu-side"><img   src="/backend-files/img/icons/menu-icon-11.svg" alt=""></span> <span> Kontaktlar </span></a>
                </li>
            </ul>
            <div class="logout-btn">
                <a href="login.html"><span class="menu-side"><img   src="/backend-files/img/icons/logout.svg" alt=""></span> <span>Logout</span></a>
            </div>
        </div>
    </div>
</div>