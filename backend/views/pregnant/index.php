<?php

use common\models\Pregnant;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\web\View $person */
/** @var common\models\PregnantSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $person->first_name . ' ' . $person->last_name . 'ning homiladorlik tarixi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pregnant-index">
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
        <?= Html::a('Yangi tibbiy ko\'rik', ['create', 'id' => $person->id], ['class' => 'btn btn-success']) ?>
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

                            //'id',
                            [
                                'attribute' => 'person_id',
                                'value' => function ($data) {
                                    return $data->person->first_name . ' ' . $data->person->last_name;
                                }
                            ],
                            'diagnosis_id',
                            'description',
                            'height',
                            //'weight_height_index',
                            //'weight',
                            //'pulse',
                            //'blood_pressure',
                            //'pregnant_week',
                            'utt_conclusion:ntext',
                            //'stomach_diameter',
                            [
                                'class' => ActionColumn::className(),
                                'urlCreator' => function ($action, Pregnant $model, $key, $index, $column) {
                                    return Url::toRoute([$action, 'id' => $model->id]);
                                }
                            ],
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
