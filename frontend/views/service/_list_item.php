<?php
/**
 * @var $model \common\models\Service
 */


?>

<div class="services-item-two">
    <div class="icon">
        <i class="flaticon-bacteria"></i>
    </div>
    <a href="<?= \yii\helpers\Url::to(['service/view', 'id' => $model->id]) ?>">
        <h3><?= $model->title ?></h3>
    </a>
    <p><?= $model->description ?></p>
    <a href="single-services.html" class="read-btn"><?= __("Read More ") ?>+</a>
</div>
