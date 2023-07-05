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
                            <img src="/frontend-files/img/logo.png" class="black-logo" alt="image">
                            <img src="/frontend-files/img/logo-2.png" class="white-logo" alt="image">
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="main-navbar">
            <div class="container">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a href="<?= \yii\helpers\Url::to(['/']) ?>">
                        <img src="/frontend-files/img/logo.png" class="black-logo" alt="image">
                        <img src="/frontend-files/img/logo-2.png" class="white-logo" alt="image">
                    </a>

                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['/']) ?>"
                                   class="nav-link <?= Yii::$app->request->url == "/" ? "active" : "" ?>">
                                    <?= Yii::t('app', 'Home') ?>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['site/about']) ?>"
                                   class="nav-link <?= Yii::$app->request->url == "/site/about" ? "active" : "" ?>">
                                     <?= Yii::t('app', 'About') ?>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['service/index']) ?>"
                                   class="nav-link <?= Yii::$app->controller->id == "service" ? "active" : "" ?>">
                                      <?= Yii::t('app', 'Services') ?>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['blog/index']) ?>"
                                   class="nav-link <?= Yii::$app->controller->id == "blog" ? "active" : "" ?>">
                                    <?= Yii::t('app', 'Blog') ?>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['site/contact']) ?>"
                                   class="nav-link <?= Yii::$app->request->url == "/site/contact" ? "active" : "" ?>">
                                    <?= Yii::t('app', 'Contact') ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <!-- End Navbar Area -->
</header>
<!-- End Header Area -->