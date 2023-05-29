<?php
/**
 * @var $model \common\models\News
 */
?>


<div class="page-title-area item-bg-1">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2>Blog Details</h2>
                    <ul>
                        <li><a href="<?= \yii\helpers\Url::to(['/']) ?>"><?= __("Home") ?></a></li>
                        <li><?= __("Blog Details") ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Start Single Blog Area -->
<section class="single-blog-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="single-blog-details">
                    <div class="blog-details-image">
                        <img src="/uploads/news/<?= $model->id ?? 5 . "/" . $model->main_image ?>" alt="image">
                    </div>

                    <div class="content">
                        <h3><?= $model->getPrettyTitle() ?></h3>
                        <p><?= $model->getPrettyDescription() ?></p>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <aside class="widget-area" id="secondary">
                    <section class="widget widget_search">
                        <h3 class="widget-title">Search</h3>

                        <form class="search-form search-top">
                            <label>
                                <span class="screen-reader-text">Search for:</span>
                                <input type="search" class="search-field" placeholder="Search...">
                            </label class="">
                            <button type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </section>

                    <section class="widget widget_content">
                        <h3 class="widget-title">Department</h3>

                        <ul class="list">
                            <li>
                                Orthopeadic
                                <i class="fa fa-chevron-right"></i>
                            </li>
                            <li>
                                Diabetic Test
                                <i class="fa fa-chevron-right"></i>
                            </li>
                            <li>
                                Behaviour health
                                <i class="fa fa-chevron-right"></i>
                            </li>
                            <li>
                                COVID-Test
                                <i class="fa fa-chevron-right"></i>
                            </li>
                            <li>
                                Live Video
                                <i class="fa fa-chevron-right"></i>
                            </li>
                        </ul>
                    </section>

                    <section class="widget widget_tinzer_posts_thumb">
                        <h3 class="widget-title">Recent Posts</h3>
                        <article class="item">
                            <a href="#" class="thumb">
                                <span class="fullimage cover bg1" role="img"></span>
                            </a>
                            <div class="info">
                                <time class="2022-06-30">30 January</time>
                                <h4 class="title usmall">
                                    <a href="index.html">Ensure at the Hygenic office</a>
                                </h4>
                            </div>
                        </article>

                        <article class="item">
                            <a href="#" class="thumb">
                                <span class="fullimage cover bg2" role="img"></span>
                            </a>
                            <div class="info">
                                <time class="2022-06-30">17 May</time>
                                <h4 class="title usmall">
                                    <a href="index.html">Aliqua tuatorn grate hjyrdre</a>
                                </h4>
                            </div>
                        </article>

                        <article class="item">
                            <a href="#" class="thumb">
                                <span class="fullimage cover bg3" role="img"></span>
                            </a>
                            <div class="info">
                                <time class="2022-06-30">18 March</time>
                                <h4 class="title usmall">
                                    <a href="index.html">How to protect from Germ</a>
                                </h4>
                            </div>
                        </article>
                    </section>

                    <section class="widget widget-image">
                        <img src="/frontend-files/img/solution-details/image5.jpg" alt="image">
                        <div class="click-btn">
                            <a href="contact.html">Click Here</a>
                        </div>
                    </section>
                </aside>
            </div>
        </div>
    </div>
</section>
