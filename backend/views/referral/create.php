<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Referral $model */

$this->title = 'Yo\'llanma yaratish';
$this->params['breadcrumbs'][] = ['label' => 'Referrals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referral-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
