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
            <span>Our Services</span>
            <h2>Our Healthcare Services</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Quis ipsum suspendisse</p>
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
                               class="read-btn"><?= __('Read more')?> +</a>
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
                        <a href="single-services.html">
                            <h3>COVID-19 Consulting</h3>
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore dolore</p>
                        <a href="single-services.html" class="read-btn">Read More +</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="services-item-two">
                        <div class="icon">
                            <i class="flaticon-shield"></i>
                        </div>
                        <a href="single-services.html">
                            <h3>Special Follow Up</h3>
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore dolore</p>
                        <a href="single-services.html" class="read-btn">Read More +</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="services-item-two">
                        <div class="icon">
                            <i class="flaticon-beauty-treatment"></i>
                        </div>
                        <a href="single-services.html">
                            <h3>Dermatology</h3>
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore dolore</p>
                        <a href="single-services.html" class="read-btn">Read More +</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="services-item-two">
                        <div class="icon">
                            <i class="flaticon-mental-health"></i>
                        </div>
                        <a href="single-services.html">
                            <h3>Mental Health</h3>
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore dolore</p>
                        <a href="single-services.html" class="read-btn">Read More +</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="services-item-two">
                        <div class="icon">
                            <i class="flaticon-crutches"></i>
                        </div>
                        <a href="single-services.html">
                            <h3>Orthopedics</h3>
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore dolore</p>
                        <a href="single-services.html" class="read-btn">Read More +</a>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6">
                    <div class="services-item-two">
                        <div class="icon">
                            <i class="flaticon-pregnancy"></i>
                        </div>
                        <a href="single-services.html">
                            <h3>Gynecological</h3>
                        </a>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore dolore</p>
                        <a href="single-services.html" class="read-btn">Read More +</a>
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
                <span>Our Doctors</span>
                <h2>Specialized Doctors</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Quis ipsum suspendisse</p>
            </div>
        </div>

        <div class="row">
            <?php foreach ($doctors as $index => $doctor): ?>
                <div class="col-lg-3 col-md-6">
                    <div class="doctor-item">
                        <div class="image">
                            <img src="/frontend-files/img/team/image1.jpg" alt="image">
                        </div>
                        <div class="content">
                            <h3><?= $doctor->first_name . " " . $doctor->last_name ?></h3>
                            <span>Cardiologist</span>

                            <ul class="social">
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fab fa-facebook-f"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fab fa-pinterest-p"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" target="_blank">
                                        <i class="fab fa-instagram"></i>
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
                        <span>Goal</span>
                        <h3>The Telehealth Goals</h3>
                        <p>Many healthcare systems around the world together with government agencies and startup
                            companies are building and delivering Telehealth </p>

                        <ul class="list">
                            <li>
                                Make health care accessible to people who live in rural or isolated communities
                            </li>
                            <li>
                                Make services more readily available or convenient for people with limited mobility,
                                time or transportation options.
                            </li>
                            <li>
                                Improve communication and coordination of care among members of a health care team and a
                                patient
                            </li>
                            <li>
                                Provide support for self-management of health care.
                            </li>
                        </ul>
                        <div class="goal-btn">
                            <a href="https://www.youtube.com/watch?v=cOT6DjgER2Y" class="default-btn popup-youtube">
                                Watch Live Video
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
                <span>Our Shop</span>
                <h2>Trending Products</h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                    et dolore magna aliqua. Quis ipsum suspendisse</p>
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
            <span>Our Project</span>
            <h2>Recent Project Cases</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Quis ipsum suspendisse</p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="projects-item">
                    <div class="image">
                        <a href="single-projects.html">
                            <img src="/frontend-files/img/projects/image1.jpg" alt="image">
                        </a>
                    </div>
                    <div class="content">
                        <p>
                            <a href="single-projects.html">
                                Reducing Hospitalization-Related Stress: Improving Patient Satisfaction and Outcomes
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="projects-item">
                    <div class="image">
                        <a href="single-projects.html">
                            <img src="/frontend-files/img/projects/image2.jpg" alt="image">
                        </a>
                    </div>
                    <div class="content">
                        <p>
                            <a href="single-projects.html">
                                TeleHealth Services and Banyan Virtual Nurse System Help Hospitals Respond to COVID-19
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="projects-item">
                    <div class="image">
                        <a href="single-projects.html">
                            <img src="/frontend-files/img/projects/image3.jpg" alt="image">
                        </a>
                    </div>
                    <div class="content">
                        <p>
                            <a href="single-projects.html">
                                The Secret Behind Changing Patient Behavior: Achieving the Confidence
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="projects-item">
                    <div class="image">
                        <a href="single-projects.html">
                            <img src="/frontend-files/img/projects/image4.jpg" alt="image">
                        </a>
                    </div>
                    <div class="content">
                        <p>
                            <a href="single-projects.html">
                                Reducing Hospitalization-Related Stress: Improving Patient Satisfaction and Outcomes
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="projects-item">
                    <div class="image">
                        <a href="single-projects.html">
                            <img src="/frontend-files/img/projects/image5.jpg" alt="image">
                        </a>
                    </div>
                    <div class="content">
                        <p>
                            <a href="single-projects.html">
                                TeleHealth Services and Banyan Virtual Nurse System Help Hospitals Respond to COVID-19
                            </a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="projects-item">
                    <div class="image">
                        <a href="single-projects.html">
                            <img src="/frontend-files/img/projects/image6.jpg" alt="image">
                        </a>
                    </div>
                    <div class="content">
                        <p>
                            <a href="single-projects.html">
                                The Secret Behind Changing Patient Behavior: Achieving the Confidence
                            </a>
                        </p>
                    </div>
                </div>
            </div>
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
                    <div class="testimonials-item">
                        <div class="content">
                            <span>Testimonials</span>
                            <h3>What Client’s Say About Us</h3>
                            <div class="icon">
                                <i class="flaticon-left-quote"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Lorem Ipsum is simply dummy text of the printing
                                and</p>

                            <div class="info">
                                <img src="/frontend-files/img/client/1.jpg" alt="image">
                                <h4>Alison Jack</h4>
                                <p>Web Developer</p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonials-item">
                        <div class="content">
                            <span>Testimonials</span>
                            <h3>What Client’s Say About Us</h3>
                            <div class="icon">
                                <i class="flaticon-left-quote"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Lorem Ipsum is simply dummy text of the printing
                                and</p>

                            <div class="info">
                                <img src="/frontend-files/img/client/2.jpg" alt="image">
                                <h4>Alex Maxwell</h4>
                                <p>Web Designer</p>
                            </div>
                        </div>
                    </div>

                    <div class="testimonials-item">
                        <div class="content">
                            <span>Testimonials</span>
                            <h3>What Client’s Say About Us</h3>
                            <div class="icon">
                                <i class="flaticon-left-quote"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua. Lorem Ipsum is simply dummy text of the printing
                                and</p>

                            <div class="info">
                                <img src="/frontend-files/img/client/3.jpg" alt="image">
                                <h4>Steven Smith</h4>
                                <p>Web Developer</p>
                            </div>
                        </div>
                    </div>
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
            <span>Partners</span>
            <h2>Featured Customer & Partners</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Quis ipsum suspendisse</p>
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

<!-- Start Blog Area -->
<section class="blog-area pt-100 pb-70">
    <div class="container-fluid">
        <div class="section-title">
            <span>News</span>
            <h2>Our Latest News</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua. Quis ipsum su</p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="image">
                        <a href="single-blog.html">
                            <img src="/frontend-files/img/blog/image1.jpg" alt="image">
                        </a>

                        <a href="#" class="date">20 April, 2022</a>
                    </div>

                    <div class="content">
                        <h3>
                            <a href="single-blog.html">Telehealth Is Here To Stay. In Your Facility Ready?</a>
                        </h3>

                        <a href="single-blog.html" class="blog-btn">Read More +</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="image">
                        <a href="single-blog.html">
                            <img src="/frontend-files/img/blog/image2.jpg" alt="image">
                        </a>

                        <a href="#" class="date">20 April, 2022</a>
                    </div>

                    <div class="content">
                        <h3>
                            <a href="single-blog.html">Coronavirus stimulus checks: What you need to know</a>
                        </h3>

                        <a href="single-blog.html" class="blog-btn">Read More +</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="blog-item">
                    <div class="image">
                        <a href="single-blog.html">
                            <img src="/frontend-files/img/blog/image3.jpg" alt="image">
                        </a>

                        <a href="#" class="date">20 April, 2022</a>
                    </div>

                    <div class="content">
                        <h3>
                            <a href="single-blog.html">People worldwide adjust to new life amid COVID-19</a>
                        </h3>

                        <a href="single-blog.html" class="blog-btn">Read More +</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Area -->

