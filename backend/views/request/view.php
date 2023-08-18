<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Request $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Requests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="request-view">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-11">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['site/index']) ?>">Bosh sahifa </a>
                    </li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active"><?= Html::encode($this->title) ?></li>
                </ul>
            </div>
        </div>
        <div class="row mt-3 mb-0">
            <div class="col-sm-12 d-flex">
                <div class="col-sm-6"><h3>&nbsp;&nbsp;&nbsp;&nbsp;<?= Html::encode($this->title ) ?></h3></div>
                <div class="col-sm-6 text-end"><a href="<?=\yii\helpers\Url::to(['pdf','id'=> $model->id])?>"><img style="width:40px" src="/backend-files/img/icons/pdf-icon-01.svg" alt=""></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id',
                        'title',
                        'first_name',
                        'last_name',
                        'phone_number',
                        'comment:ntext',
                        'created_at:datetime',
//                        'updated_at',
                        'status',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
