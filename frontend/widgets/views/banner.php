<?php if (!empty($models)): ?>
    <!-- Start Main Banner Area -->
    <?php foreach ($models as $model) :; ?>
        <?php
            $breadcrumb = '';
            if ($model->type == 1  ){
            $breadcrumb = '';
            }elseif ($model->type == 2){
            $breadcrumb = 'Service';
            }elseif ($model->type == 2){
            $breadcrumb = 'About';
        }?>
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



                            </div>
                            <?php

                            if ($model->type != 1) {
                                echo '<div class="container">
                                            <div class="page-title-content">
                                                <h2>About</h2>
                                                <ul>
                                                    <li><a href="' . \yii\helpers\Url::to(['/']) . '">' . __('Home') . '</a></li>
                                                    <li>'.$breadcrumb.'</li>
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