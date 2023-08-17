<?php
/**
 * @var $dataProvider \yii\data\ActiveDataProvider
 * @var $model        \common\models\VaccinationPeople
 * @var $searchModel  \common\models\search\VaccinationPeopleSearch
 * @var $person
 * @var $qvp_id
 */

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = $person->first_name .' '. $person->last_name . 'ning emlash tarixini ko\'rish';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosis-group-index">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['site/index']) ?>">Bosh sahifa </a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['vaccination-people/people']) ?>">Emlash</a></li>
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
                    <div class="col-1  mb-3">
                        <a href="<?=Url::to(['pdf','id'=>$person->id, 'qvp_id' => $qvp_id])?>"><img style="width:50px" src="/backend-files/img/icons/pdf-icon-01.svg" alt=""></a>
                    </div>

                    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
//                            'id',
                            [
                                'attribute' => 'vaccination_class_id',
                                'value' => function ($data) {
                                    return $data->vacclass->name;
                                }
                            ],
                            [
                                'attribute' => 'vaccination_id',
                                'value' => function ($data) {
                                    return $data->vaccination->name;
                                }
                            ],
                            [
                                'attribute' => 'created_at',
                                'format' => ['datetime', 'php:d.m.Y H:m']
                            ],
                            'amount',
                            'period',
                            'seria',
                            'preparat_name',
                            'reaction',
                            'reaction_local',
                            'reaction_common',
                            'medical_repulse'
                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
