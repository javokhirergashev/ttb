<?php

use common\models\Request;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\RequestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Murojaatlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['/']) ?>">Bosh sahifa </a>
                    </li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active"><?= Html::encode($this->title) ?></li>
                </ul>
            </div>
        </div>
    </div>
    <h3><?= Html::encode($this->title) ?></h3>
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="table-responsive p-5">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

//                            'id',
                            'title',
                            'first_name',
                            'last_name',
                            'phone_number',
                            'comment:ntext',
                            'created_at:datetime',
//                            'updated_at',
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Status',
                                'headerOptions' => ['style' => 'text-align:center'],
                                'template' => '{view}',
                                'contentOptions' => ['style' => 'min-width:150px;max-width:150px;width:150px', 'class' => 'v-align-middle'],
                                'buttons' => [
                                    'view' => function ($url, $model) {
                                        $url = '/request/view?id=' . $model->id;
                                        if ($model->status == Request::STATUS_PENDING) {
                                            $t = '/request/change-status?id=' . $model->id;
                                            return Html::a('<span class="badge bg-danger" title="Отметить как прочитанные">New</span>', Url::to($t));

                                        }
                                        return '<img src="/backend-files/img/ok.png" width="40px">
                                                <a href="'.$url.'" class="btn btn-primary"><i class="far fa-eye"></i></a>
';
                                    },

                                ],

                            ],
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>
</div>
