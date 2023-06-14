<?php

use common\models\Request;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\RequestSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Requests';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="request-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Request', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'first_name',
            'last_name',
            'phone_number',
            'comment:ntext',
//            'created_at',
//            'updated_at',
            'status',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'Amallar',
                'headerOptions' => ['style' => 'text-align:center'],
                'template' => '{view}',
                'contentOptions' => ['style' => 'min-width:150px;max-width:150px;width:150px', 'class' => 'v-align-middle'],
                'buttons' => [
                    'view' => function ($url, $model) {
                        if ($model->status == Request::STATUS_PENDING) {
                            $t = '/request/change-status?id=' . $model->id;
                            return Html::a('<span class="badge bg-danger" title="Отметить как прочитанные">New</span>', Url::to($t));

                        }
                        return '<img src="/backend-files/img/ok.png" width="40px">';
                    },

                ],

            ],
        ],
    ]); ?>


</div>
