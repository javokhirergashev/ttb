<!-- Start Header Area -->
<header class="header-area">
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <ul class="top-list">
                        <lis>
                            <i class='flaticon-clock'></i>
                            <?= \common\models\Contact::getContact("working_time")->title[Yii::$app->language] ?? ""; ?> <?= \common\models\Contact::getContact("working_time")->value; ?>
                        </lis>
                        <li>
                            <i class='flaticon-phone-call'></i>
                            <a href="tel:<?= \common\models\Contact::getContact("first_phone")->value; ?>"><?= \common\models\Contact::getContact("first_phone")->title[Yii::$app->language] ?? ""; ?>
                                : <?= \common\models\Contact::getContact("first_phone")->value; ?></a>
                        </li>
                        <li>
                            <i class='flaticon-paper-plane'></i>
                            <a href="mailto:<?= \common\models\Contact::getContact("second_email")->value; ?>"><span
                                        class="__cf_email__"><?= \common\models\Contact::getContact("first_email")->value; ?></span></a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-6">
                    <ul class="top-social">
                        <li>
                            <a href="<?= \common\models\Contact::getContact("telegram")->value; ?>" class="fa-telegram">
                                <i class="fab fa-telegram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= \common\models\Contact::getContact("instagram")->value; ?>" class="instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= \common\models\Contact::getContact("facebook")->value; ?>" class="facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="<?= \common\models\Contact::getContact("tweetter")->value; ?>" class="twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Navbar Area -->
    <div class="navbar-area navbar-two">
        <div class="main-responsive-nav">
            <div class="container">
                <div class="main-responsive-menu">
                    <div class="logo">
                        <a href="index.html">
                            <img src="/frontend-files/img/NSHTB.tif" class="black-logo" alt="image">
                            <img src="/frontend-files/img/logo-2.png" class="white-logo" alt="image">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a style="width:80%" href="<?= \yii\helpers\Url::to(['/']) ?>">
                        <img src="/frontend-files/img/NSHTB.png" class="black-logo" alt="image" style="width: 20%; height: 20%">
                        <img src="/frontend-files/img/logo-2.png" class="white-logo" alt="image">
                    </a>

                    <div style="width:100%" class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['/']) ?>"
                                   class="nav-link <?= Yii::$app->request->url == "/" ? "active" : "" ?>">
                                    <?= Yii::t('app', "Bosh sahifa")?>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['site/about']) ?>"
                                   class="nav-link <?= Yii::$app->request->url == "/site/about" ? "active" : "" ?>">
                                    <?= Yii::t('app', "Biz haqimizda")?>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['service/index']) ?>"
                                   class="nav-link <?= Yii::$app->controller->id == "service" ? "active" : "" ?>">
                                    <?= Yii::t('app', "Xizmatlar")?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['blog/index']) ?>"
                                   class="nav-link <?= Yii::$app->controller->id == "blog" ? "active" : "" ?>">
                                    <?= Yii::t('app', "Yangiliklar")?>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['site/contact']) ?>"
                                   class="nav-link <?= Yii::$app->request->url == "/site/contact" ? "active" : "" ?>">
                                    <?= Yii::t('app', "Kontaktlar")?>
                                </a>
                            </li>
                        </ul>
                        <div class="others-options">
                            <div class="dropdown">
                                <li class="dropdown-toggle nav-item" data-bs-toggle="dropdown"
                                    style="list-style-type: none">
                                    <span class="fa fa-globe"></span>
<!--                                    --><?//= Yii::$app->language ?>
                                </li>
                                <ul class="dropdown-menu">
                                    <?php
                                    foreach (Yii::$app->params['languages'] as $key => $value) {
                                        echo " <li><a class='dropdown-item' href='" . \yii\helpers\Url::current(['language' => $value]) . "'>$value</a></li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->
</header>
<!-- End Header Area -->