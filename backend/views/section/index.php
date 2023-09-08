<?php

use common\models\Section;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\SectionSearch $searchModel */
/** @var $clinic_id */

$this->title = 'Bo\'limlar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="section-index">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['site/index']) ?>">Bosh sahifa </a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['clinic/index']) ?>">Shifoxonalar</a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active"><?= Html::encode($this->title) ?></li>
                </ul>
            </div>
        </div>
    </div>
    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Yangi bo\'lim qo\'shish', ['create', 'clinic_id' => $clinic_id], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="table-responsive p-5">
                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
//                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

//                            'id',
                            [
                                'attribute' => 'clinic_id',
                                'value' => function ($data) {
                                    return \common\models\Clinic::findOne($data->clinic_id)->name;
                                }
                            ],
                            'name',
                            'room_count',
                            [
                                'attribute' => 'status',
                                'value' => function ($data) {
                                    if ($data->status == \common\models\Clinic::STATUS_ACTIVE) {
                                        return '<span class="badge badge-success">Faol</span>';
                                    } else {
                                        return '<span class="badge badge-danger">Faol emas</span>';
                                    }
                                },
                                'format' => 'raw',
                                'filter' => [\common\models\Clinic::STATUS_ACTIVE => 'Faol',\common\models\Clinic::STATUS_INACTIVE => 'Faol emas']
                            ],
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
                                <div class="btn-group flex-center">
                                    <a href="/{$controller}/update?id={$model->id}" class="btn btn-primary"><i class="far fa-edit"></i></a>
                                    <a href="/room/index?section_id={$model->id}&clinic_id={$model->clinic_id}" class="btn btn-primary"><i class="fas fa-people-roof"></i></a>
                                    <a href="/{$controller}/delete?id={$model->id}" id="{$controller}{$model->id}" data-postID="{$model->id}" data-postType="{$controller}" class="btn btn-danger postRemove" data-method="post"><i class="far fa-trash-alt"></i></a>
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
