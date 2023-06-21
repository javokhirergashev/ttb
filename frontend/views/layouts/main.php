<?php

/** @var \yii\web\View $this */

/** @var string $content */

use frontend\assets\AppAsset;
use yii\bootstrap5\Html;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
   <!DOCTYPE html>
   <html lang="<?= Yii::$app->language ?>" class="h-100">
   <head>
      <meta charset="<?= Yii::$app->charset ?>">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <?php $this->registerCsrfMetaTags() ?>
      <title><?= Html::encode($this->title) ?></title>
      <?php $this->head() ?>
   </head>
   <body>
   <?php $this->beginBody() ?>

   <!-- Start Preloader Area -->
   <div class="preloader">
      <div class="spinner"></div>
   </div>


   <!-- End Preloader Area -->
   <?= \frontend\widgets\Header::widget() ?>
   <?= $content ?>
   <?= \frontend\widgets\Footer::widget() ?>
   <?php $this->endBody() ?>
   </body>
   </html>
<?php $this->endPage();
