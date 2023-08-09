<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DiagnosisList $model */

$this->title = 'Yangi tashhis qo\'shish';
$this->params['breadcrumbs'][] = ['label' => 'Diagnosis Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosis-list-create">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['site/index']) ?>">Dashboard </a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['diagnosis-list/index']) ?>">Tashxislar</a></li>
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
