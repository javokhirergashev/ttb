<?php if (!empty($models)): ?>

    <!-- Start Main Banner Area -->
    <?php foreach ($models as $model) :; ?>
        <div class="main-banner"
             style="background-image: url('<?= \common\models\StaticFunctions::getImage('banner', $model->id, $model->image) ?>');">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-7">
                                <div class="main-banner-content">
                                    <h1><?= $model->title[Yii::$app->language] ?></h1>
                                    <p><?= $model->description[Yii::$app->language] ?></p>
                                </div>

                                <div class="banner-form">
                                    <form>
                                        <div class="row align-items-center">
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <select>
                                                        <option>Specialist</option>
                                                        <option value="">Dr. James Adult</option>
                                                        <option value="">Dr. James Alison</option>
                                                        <option value="">Dr. Peter Adlock</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <select>
                                                        <option>Category</option>
                                                        <option value="">Cardiologists</option>
                                                        <option value="">Dermatologists</option>
                                                        <option value="">Endocrinologists</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <select>
                                                        <option>Condition</option>
                                                        <option>Fever</option>
                                                        <option>Allergies</option>
                                                        <option>Morbidity</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-md-6">
                                                <div class="form-group">
                                                    <button type="submit" class="banner-form-btn">
                                                        Search
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="banner-btn">
                                    <a href="services.html" class="default-btn">
                                        Services
                                        <span></span>
                                    </a>

                                    <a href="contact.html" class="default-btn-two">
                                        Contact Us
                                        <span></span>
                                    </a>
                                </div>
                            </div>
                            <?php
                                if ($model->type != 1) {
                                    echo '<div class="container">
                                            <div class="page-title-content">
                                                <h2>About</h2>
                                                <ul>
                                                    <li><a href="' . \yii\helpers\Url::to(['/']) . '">' . __('Home') . '</a></li>
                                                    <li></li>
                                                </ul>
                                            </div>
                                        </div>';
                                    }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- End Main Banner Area -->

<?php endif; ?>