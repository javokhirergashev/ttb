<?php
/**
 * @var $model \common\models\Service
 */
?>

<!-- Start Page Title Area -->
<div class="page-title-area item-bg-5">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="page-title-content">
                    <h2><?= __("Services Details") ?></h2>
                    <ul>
                        <li><a href="<?= \yii\helpers\Url::to(['/']) ?>"><?= __("Home") ?></a></li>
                        <li><?= __("Services Details") ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Title Area -->

<!-- Service details -->
<div class="service-details ptb-100">
    <div class="container">
        <div class="service-details-image">
            <img src="/uploads/service/<?= $model->id . "/" . $model->image ?>" alt="image">
        </div>

        <div class="service-details-content">
            <h3><?= $model->getPrettyTitle() ?></h3>

            <?= $model->getPrettyDescription() ?>

        </div>
    </div>
</div>
<!-- End Service details -->

