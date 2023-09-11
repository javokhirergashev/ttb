<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li>
                    <a href="<?= \yii\helpers\Url::to(['/']) ?>"
                       class="<?= Yii::$app->request->url == "/" ? "active" : "" ?>">
                   <span class="menu-side">
                       <img src="/backend-files/img/icons/menu-icon-01.svg" alt="">
                   </span>
                        <span> Bosh sahifa</span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="#">
                   <span class="menu-side">
                       <img src="/backend-files/img/icons/menu-icon-03.svg" alt="">
                   </span>
                        <span>Xodimlar bo'limi</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['user/']) ?>"
                               class="<?= Yii::$app->controller->id == "user" ? "active" : "" ?>">Xodimlar ro'yhati</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['position/']) ?>"
                               class="<?= Yii::$app->controller->id == "position" ? "active" : "" ?>">Lavozimlar</a>
                        </li>

                    </ul>
                </li>
                <li class="submenu">
                    <a href="#">
                   <span class="menu-side">
                       <img src="/backend-files/img/icons/menu-icon-09.svg" alt="">
                   </span>
                        <span>Tashkilotlar va <br> brigadalar</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['clinic/']) ?>"
                               class="<?= Yii::$app->controller->id == "clinic" ? "active" : "" ?>">Shifoxonalar</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['qvp/index']) ?>"
                               class="<?= Yii::$app->controller->id == "qvp" ? "active" : "" ?>">Qvp
                            </a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['terriytory/index']) ?>"
                               class="<?= Yii::$app->controller->id == "terriytory" ? "active" : "" ?>">Teritoriya
                            </a>
                        </li>

                    </ul>
                </li>

                <li>
                    <a href="<?= \yii\helpers\Url::to(['people/']) ?>"
                       class="<?= Yii::$app->controller->id == "people" ? "active" : "" ?>">
                   <span class="menu-side">
                       <img src="/backend-files/img/icons/menu-icon-02.svg" alt="">
                   </span>
                        <span> Aholi ro'yxati </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="#">
                     <span class="menu-side">
                         <img src="/backend-files/img/icons/menu-icon-15.svg" alt="">
                     </span>
                        <span>Emlash bo'limi</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="<?= \yii\helpers\Url::to(['vaccination-class/']) ?>"
                               class="<?= Yii::$app->controller->id == "vaccination-class" ? "active" : "" ?>">Emlash
                                sinflari</a>
                        </li>
                        <li><a href="<?= \yii\helpers\Url::to(['vaccination/']) ?>"
                               class="<?= Yii::$app->controller->id == "vaccination" ? "active" : "" ?>">Emlash
                                turlari</a>
                        </li>
                        <li><a href="<?= \yii\helpers\Url::to(['vaccination-people/people']) ?>"
                               class="<?= Yii::$app->controller->id == "vaccination-people/people" ? "active" : "" ?>">Emlash</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= \yii\helpers\Url::to(['disablity-class/']) ?>"
                       class="<?= Yii::$app->controller->id == "disablity-class" ? "active" : "" ?>">
                     <span class="menu-side">
                         <img src="/backend-files/img/icons/menu-icon-13.svg" alt="">
                     </span>
                        <span> Nogironlik sinflari </span>
                    </a>
                </li>
                <li>
                    <a href="<?= \yii\helpers\Url::to(['referral/index']) ?>"
                       class="<?= Yii::$app->controller->id == "referral" ? "active" : "" ?>">
                   <span class="menu-side">
                       <img src="/backend-files/img/icons/menu-icon-09.svg" alt=""></span>
                        <span> Yo'llanmalar <span
                                    class="badge badge-warning"><?= \common\models\Referral::find()->andWhere(['status' => \common\models\Referral::STATUS_PENDING])->count() ?></span></span>
                    </a>
                </li>
                <li>
                    <a href="<?= \yii\helpers\Url::to(['reference/index']) ?>"
                       class="<?= Yii::$app->controller->id == "referral" ? "active" : "" ?>">
                   <span class="menu-side">
                       <img src="/backend-files/img/icons/menu-icon-13.svg" alt=""></span>
                        <span> Ma'lumotnomalar</span>
                    </a>
                </li>
                <li>
                    <a href="<?= \yii\helpers\Url::to(['request/']) ?>"
                       class="<?= Yii::$app->controller->id == "request" ? "active" : "" ?>">
                   <span class="menu-side">
                       <img src="/backend-files/img/icons/menu-icon-12.svg" alt="">
                   </span>
                        <span> Murojaatlar </span>
                    </a>
                </li>
                <li class="submenu">
                    <a href="#">
                   <span class="menu-side">
                       <img src="/backend-files/img/icons/menu-icon-15.svg" alt="">
                   </span>
                        <span>Tashxislar to'plami</span> <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['diagnosis-class/']) ?>"
                               class="<?= Yii::$app->controller->id == "diagnosis-class" ? "active" : "" ?>">Tashxislar
                                sinfi</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['diagnosis-group/']) ?>"
                               class="<?= Yii::$app->controller->id == "diagnosis-group" ? "active" : "" ?>">Tashxislar
                                guruhi</a>
                        </li>
                        <li><a href="<?= \yii\helpers\Url::to(['diagnosis-list/']) ?>"
                               class="<?= Yii::$app->controller->id == "diagnosis-list" ? "active" : "" ?>">Tashxislar
                                ro'yxati</a>
                        </li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#"><span class="menu-side"><img src="/backend-files/img/icons/menu-icon-16.svg"
                                                             alt=""></span>
                        <span>Sayt sozlamalari</span> <span class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['news/']) ?>"
                               class="<?= Yii::$app->controller->id == "news" ? "active" : "" ?>">Yangiliklar</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['menu/']) ?>"
                               class="<?= Yii::$app->controller->id == "menu" ? "active" : "" ?>">Menyular</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['service/']) ?>"
                               class="<?= Yii::$app->controller->id == "service" ? "active" : "" ?>">Xizmatlar</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['banner/']) ?>"
                               class="<?= Yii::$app->controller->id == "banner" ? "active" : "" ?>">Bannerlar</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['partners/']) ?>"
                               class="<?= Yii::$app->controller->id == "partners" ? "active" : "" ?>">Hamkorlar</a>
                        </li>
                        <li>
                            <a href="<?= \yii\helpers\Url::to(['contact/']) ?>"
                               class="<?= Yii::$app->controller->id == "contact" ? "active" : "" ?>">Kontaktlar</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="<?= \yii\helpers\Url::to(['site/map']) ?>"
                       class="<?= Yii::$app->controller->id == "site" ? "active" : "" ?>">
                        <span class="menu-side"><img src="/backend-files/img/icons/menu-icon-08.svg" alt=""></span>
                        <span> Kartada ko'rish</span>
                    </a>
                </li>
            </ul>
            <div class="logout-btn">
                <a data-method="post" href="<?= \yii\helpers\Url::to(['site/logout']) ?>"><span class="menu-side"><img
                                src="/backend-files/img/icons/logout.svg" alt=""></span> <span>Logout</span></a>
            </div>
        </div>
    </div>
</div>