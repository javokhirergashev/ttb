<?php

use common\models\News;
use common\models\StaticFunctions;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\NewsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Yangiliklar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">
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


    <p>
        <?= Html::a('Yangiliklar yaratish', ['create'], ['class' => 'btn btn-success']) ?>
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
                                },
                            ],
                            [
//                                'attribute' => 'description',
//                                'value' => function ($model) {
//                                    return $model->description[Yii::$app->language];
//                                },
//                                'format'
                            ],
//                            [
////                                'attribute' => 'poster',
//                                'value' => function($data){
//                                    $image = StaticFunctions::getImage('news',$data->id, $data->poster);
//                                    return "<img src='$image' style='max-width: 120px; text-align: center!important;'>";
//                                },
//                                'format' => 'html'
//                            ],
//                            [
////                                'attribute' => 'main_image',
//                                'value' => function($data){
//                                    $image = StaticFunctions::getImage('news',$data->id, $data->main_image);
//                                    return "<img src='$image' style='max-width: 120px; text-align: center!important;'>";
//                                },
//                                'format' => 'html'
//                            ],
                            'published_at',
                            [
                                'attribute' => 'created_at',
                                'format' => ['datetime', 'php:d.m.Y H:m']
                            ],
                            [
                                'attribute' => 'updated_at',
                                'format' => ['datetime', 'php:d.m.Y H:m']
                            ],
                            //'type',
//                            'category_id',
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
