<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Referral $model */

$this->title = 'Yo\'llanmani o\'zgartirish: ';
$this->params['breadcrumbs'][] = ['label' => 'Referrals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="referral-update">

   <h1><?= Html::encode($this->title) ?></h1>

   <?= $this->render('_form', [
      'model' => $model,
   ]) ?>

</div>
