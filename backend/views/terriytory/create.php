<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Territory $model */

$this->title = "Yangi brigadalar qo'shish";
$this->params['breadcrumbs'][] = ['label' => 'Territories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="territory-create">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['site/index']) ?>">Dashboard </a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['terriytory/index']) ?>">Brigadalar</a></li>
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
