<?php
/**
 * @var $model \common\models\News
 */
?>

<div class="blog-item">
    <div class="image">
        <a href="<?= \yii\helpers\Url::to(['blog/view', 'id' => $model->id]) ?>">
            <img src="/uploads/news/<?= $model->id . "/" . $model->poster ?>" alt="image">
        </a>

        <a href="#" class="date"><?= $model->published_at ?></a>
    </div>

    <div class="content">
        <h3>
            <a href="<?= \yii\helpers\Url::to(['blog/view', 'id' => $model->id]) ?>"><?= $model->getPrettyTitle() ?></a>
        </h3>

        <a href="<?= \yii\helpers\Url::to(['blog/view', 'id' => $model->id]) ?>" class="blog-btn">Read More +</a>
    </div>
</div>