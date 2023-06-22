<!-- Start Header Area -->
<header class="header-area">
    <div class="top-header">
        <div class="container">
            
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <ul class="top-list">
                        <li>
                            <i class='flaticon-clock'></i>
                            Mon-Fri 09-18.00
                        </li>
                        <li>
                            <i class='flaticon-phone-call'></i>
                            <a href="tel:821-456-241">Call Us: +821-456-241</a>
                        </li>
                        <li>
                            <i class='flaticon-paper-plane'></i>
                            <a href="https://templates.envytheme.com/cdn-cgi/l/email-protection#670f020b0b08270e0901084904080a"><span
                                        class="__cf_email__" data-cfemail="c1a9a4adadae81a8afa7aeefa2aeac">[email&#160;protected]</span></a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-6">
                    <ul class="top-social">
                        <li>
                            <a href="#" class="facebook">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="twitter">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="pinterest">
                                <i class="fab fa-pinterest-p"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="instagram">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li>
                            <a href="sign-in.html" class="log-in">
                                Sign In
                            </a>
                        </li>
                        <li>
                            <a href="sign-up.html" class="sign-in">
                                Sign Up
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
                                    Home
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['site/about']) ?>"
                                   class="nav-link <?= Yii::$app->request->url == "/site/about" ? "active" : "" ?>">
                                    About
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['service/index']) ?>"
                                   class="nav-link <?= Yii::$app->controller->id == "service" ? "active" : "" ?>">
                                    Services
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['blog/index']) ?>"
                                   class="nav-link <?= Yii::$app->controller->id == "blog" ? "active" : "" ?>">
                                    Blog
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?= \yii\helpers\Url::to(['site/contact']) ?>"
                                   class="nav-link <?= Yii::$app->request->url == "/site/contact" ? "active" : "" ?>">
                                    Contact
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