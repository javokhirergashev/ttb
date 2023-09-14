<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Qvp $model */

$this->title = "Yangi poliklinika qo'shish";
$this->params['breadcrumbs'][] = ['label' => 'Qvps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qvp-create">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['/']) ?>">Bosh sahifa </a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['qvp/index']) ?>">Oila poliklinikalari</a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active"><?= Html::encode($this->title) ?></li>
                </ul>
            </div>
        </div>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
