<?php

use common\models\People;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\PeopleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Aholi ro\'yxati';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="people-index">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['site/index']) ?>">Bosh sahifa </a>
                    </li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active"><?= Html::encode($this->title) ?></li>
                </ul>
            </div>
        </div>
    </div>
    <h3><?= Html::encode($this->title) ?></h3>
    <p>
        <?= Html::a('Yangi aholi qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="table-responsive p-5">
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
//                            'id',
                            'first_name',
                            'last_name',
//                            'middle_name',
//                            'pinfl',
//                            'passport_seria',
                            'passport_number',
                            'phone_number',
                            'birthday',
                            //'region_id',
                            //'district_id',
//                            'quarter_id',
//                            'qvp_id',
                            'metrka_number',
//                            'gender',
                            [
                                'attribute' => 'territory_code',
                                'value' => function ($data) {
                                    return "";
//                                    return \common\models\Territory::findOne($data->territory_code)->name;
                                }
                            ],
//                            [
//                                'attribute' => 'status',
//                                'value' => function ($data) {
//                                    if ($data->status == \common\models\People::STATUS_ACTIVE) {
//                                        return '<span class="badge badge-success">Faol</span>';
//                                    } else {
//                                        return '<span class="badge badge-danger">Faol emas</span>';
//                                    }
//                                },
//                                'format' => 'raw',
//                                'filter' => [\common\models\People::STATUS_ACTIVE => 'Faol', \common\models\People::STATUS_INACTIVE => 'Faol emas']
//                            ],
                            [
                                'class' => 'yii\grid\ActionColumn',
                                'header' => 'Amallar',
                                'headerOptions' => ['style' => 'text-align:center'],
                                'template' => '{buttons}',
                                'contentOptions' => ['style' => 'min-width:150px;max-width:150px;width:150px', 'class' => 'v-align-middle'],
                                'buttons' => [
                                    'buttons' => function ($url, $model) {
                                        $controller = Yii::$app->controller->id;
                                        $code = <<<BUTTONS
                                <div class="btn-group flex-center"  >
                                    <a href="/{$controller}/view?id={$model->id}" id="{$controller}{$model->id}" data-postID="{$model->id}" class="btn btn-success"><i class="far fa-eye"></i></a>
                                    <a href="/{$controller}/update?id={$model->id}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                    <a href="/{$controller}/delete?id={$model->id}" data-method="post" id="{$controller}{$model->id}" data-postID="{$model->id}" data-postType="{$controller}" class="btn btn-danger postRemove" data-method="post"><i class="far fa-trash-alt"></i></a>
                                </div>
BUTTONS;
                                        return $code;
                                    }

                                ],

                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
