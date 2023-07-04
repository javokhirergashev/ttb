<?php
/**
 * @var $dataProvider \yii\data\ActiveDataProvider
 */
?>

<div class="page-title-area item-bg-5">
   <div class="d-table">
      <div class="d-table-cell">
         <div class="container">
            <div class="page-title-content">
               <h2>Blog</h2>
               <ul>
                  <li><a href="<?= \yii\helpers\Url::to(['/']) ?>">Home</a></li>
                  <li><?= Yii::t('app', 'Blog') ?></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- End Page Title Area -->

<!-- Start Blog Area -->
<section class="blog-area ptb-100">
   <div class="container-fluid">
      <div class="section-title">
         <span>News</span>
         <h2>Our Latest News</h2>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua. Quis ipsum su</p>
      </div>
      <?= \yii\widgets\ListView::widget([
         'dataProvider' => $dataProvider,
         'itemView' => '_list_item',
         'options' => ['class' => 'row'],
         'itemOptions' => ['class' => 'col-lg-4 col-md-6'],
         'layout' => '{items}\n{pager}'
      ]) ?>
      <div class="row">
         <?php if (count($dataProvider->getModels()) <= 0): ?>
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
         <?php endif; ?>
         <div class="col-lg-12 col-md-12">
            <div class="pagination-area">
               <a href="#" class="prev page-numbers">
                  <i class="fa fa-chevron-left"></i>
               </a>

               <a href="#" class="page-numbers">1</a>
               <span class="page-numbers current" aria-current="page">2</span>
               <a href="#" class="page-numbers">3</a>
               <a href="#" class="page-numbers">4</a>
               <a href="#" class="next page-numbers">
                  <i class="fa fa-chevron-right"></i>
               </a>
            </div>
         </div>
      </div>
   </div>
</section>