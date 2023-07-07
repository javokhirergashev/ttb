<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Qvp $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Qvps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="qvp-view">

   <h1><?= Html::encode($this->title) ?></h1>

   <p>
      <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
      <?= Html::a('Delete', ['delete', 'id' => $model->id], [
         'class' => 'btn btn-danger',
         'data' => [
            'confirm' => 'Are you sure you want to delete this item?',
            'method' => 'post',
         ],
      ]) ?>
   </p>

   <?= DetailView::widget([
      'model' => $model,
      'attributes' => [
         'id',
         'title',
         'address',
         'phone_number',
         'number',
         [
            'attribute' => 'type',
            'label' => 'Qvp turi',
            'value' => function ($model) {
               return $model->getTypeValue();
            }
         ],
         [
            'attribute' => 'status',
            'label' => 'Status',
            'value' => function ($model) {
               return $model->getStatusValue();
            }
         ],
         [
            'attribute' => 'district_id',
            'label' => 'Hudud',
            'value' => function ($model) {
               return $model->district->name[Yii::$app->language];
            }
         ],
         [
            'attribute' => 'quarter_id',
            'label' => 'MFY',
            'value' => function ($model) {
               return $model->quarter->name[Yii::$app->language];
            }
         ],
         [
            'attribute' => 'region_id',
            'label' => 'Viloyat',
            'value' => function ($model) {
               return $model->region->name[Yii::$app->language];
            }
         ],
         'created_at:date',
         'updated_at:date',
      ],
   ]) ?>

</div>
