<?php

use common\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\CategorySearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Kategoriyalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['/']) ?>">Bosh sahifa </a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active"><?= Html::encode($this->title) ?></li>
                </ul>
            </div>
        </div>
    </div>
    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Yangi kategoriya qo\'shish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

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

//            'id',
                            [
                                'attribute' => 'title',
                                'value' => function ($model) {
                                    return $model->title[Yii::$app->language];
                                }
                            ],
//                            'icon',
//            'parent_id',
                            [
                                'attribute' => 'status',
                                'value' => function ($data) {
                                    if ($data->status == 1) {
                                        return 'faol';
                                    }else{
                                        return 'faol emas';
                                    }
                                }
                            ],
                            //'type',
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
