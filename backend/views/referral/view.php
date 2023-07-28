<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Referral $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Referrals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="referral-view">

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
         'clinic.name',
         [
            'attribute' => 'type',
            'label' => 'Yo\'llanma turi',
            'value' => function ($model) {
               return \common\models\Referral::getTypeList()[$model->type];
            }
         ],
         'reason',
         [
            'attribute' => 'people_id',
            'label' => 'Bemor FIO',
            'value' => function ($model) {
               return $model->people->first_name . " " . $model->people->last_name;
            }
         ],
         [
            'attribute' => 'diagnosis_list_id',
            'label' => 'Tashxis',
            'value' => function ($model) {
               return $model->diagnosis_list_id ? $model->diagnosisList->name : "--- ---";
            }
         ],

         'section.name',
         [
            'attribute' => 'created_at',
            'label' => 'Yaratilgan vaqti',
            'value' => function ($model) {
               return date('Y.m.d H:i', $model->created_at);
            }
         ],
         [
            'attribute' => 'updated_at',
            'label' => 'O\'zgartirilgan vaqti',
            'value' => function ($model) {
               return date('Y.m.d H:i', $model->updated_at);
            }
         ],
         [
            'attribute' => 'status',
            'label' => 'Holati',
            'format' => 'raw',
            'value' => function ($model) {
               return $model->getStatusName();
            }
         ],
         'comment'
      ],
   ]) ?>

</div>
