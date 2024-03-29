<?php

use BaconQrCode\Encoder\QrCode;
use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\People $model */

$this->title = $model->last_name . ' ' . $model->first_name . ' ' . $model->middle_name;
$this->params['breadcrumbs'][] = ['label' => 'Peoples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="people-view">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12 ">
                <h4 class="text-center">Namangan shahar tibbiyot birlashmasiga qarashli <?=$model->qvp->title?> da ro'yhatda turuvchi</h4>
                <h4 class="text-center">fuqaro <?= Html::encode($this->title)?>ning ma'lumotlari</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="table-responsive p-5">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
//            'id',
                            'first_name',
                            'last_name',
                            'middle_name',
                            [
                                'attribute' => 'status',
                                'value' => function ($data) {
                                    if ($data->status == \common\models\People::STATUS_ACTIVE) {
                                        return 'faol';
                                    } else {
                                        return 'faol emas';
                                    }
                                }
                            ],
                            'pinfl',
                            'passport_number',
                            'phone_number',
                            'birthday',
                            'job',
                            [
                                'attribute' => 'region_id',
                                'value' => function ($data) {
                                    return $data->region->name[Yii::$app->language];
                                }
                            ],
                            [
                                'attribute' => 'district_id',
                                'value' => function ($data) {
                                    return $data->district->name[Yii::$app->language];
                                }
                            ],
                            [
                                'attribute' => 'quarter_id',
                                'value' => function ($data) {
                                    return $data->quarter->name[Yii::$app->language];
                                }
                            ],
                            [
                                'attribute' => 'qvp_id',
                                'value' => function ($data) {
                                    return $data->qvp->title;
                                }
                            ],
                            'metrka_number',
                            [
                                'attribute' => 'gender',
                                'value' => function ($data) {
                                    if ($data->status == \common\models\People::GENDER_MALE) {
                                        return 'erkak';
                                    } else {
                                        return 'ayol';
                                    }
                                }
                            ],
                            [
                                'attribute' => 'territory_code',
                                'value' => function ($data) {
                                    return $data->territory->name;
                                }
                            ],
                            [
                                'attribute' => 'oila_boshi',
                                'value' => function ($data) {
                                    if ($data->status == \common\models\People::OILA_BOSHI_TRUE) {
                                        return 'Ha';
                                    } else if ($data->status == \common\models\People::OILA_BOSHI_FALSE) {
                                        return 'Yo\'q';
                                    }
                                }
                            ],
                            [
                                'attribute' => 'dispensary_control',
                                'value' => function ($data) {
                                    if ($data->status == \common\models\People::DISPENSARY_CONTROL_TRUE) {
                                        return 'Turadi';
                                    } else if ($data->status == \common\models\People::DISPENSARY_CONTROL_FALSE) {
                                        return 'Turmaydi';
                                    }
                                }
                            ],
                            [
                                'attribute' => 'disability_class_id',
                                'value' => function ($data) {
                                    if ($data->disablity->name != 0) {
                                        return $data->disablity->name;
                                    } else {
                                        return 'Yo\'q';
                                    }
                                }
                            ],
                            [
                                'attribute' => 'disability_group',
                                'value' => function ($data) {
                                    if ($data->disability_group == \common\models\People::DISABILITY_FALSE) {
                                        return 'Yo\'q';
                                    } else if ($data->disability_group == \common\models\People::DISABILITY_FIRST) {
                                        return 'I guruh';
                                    } else if ($data->disability_group == \common\models\People::DISABILITY_SECOND) {
                                        return 'II guruh';
                                    } else if ($data->disability_group == \common\models\People::DISABILITY_THIRD) {
                                        return 'II guruh';
                                    } else if ($data->disability_group == \common\models\People::DISABILITY_FOURTH) {
                                        return 'IV guruh';
                                    }
                                }
                            ],
                            [
                                'attribute' => 'ayol_daftar',
                                'value' => function ($data) {
                                    if ($data->ayol_daftar == \common\models\People::AYOL_DAFTAR_TRUE) {
                                        return 'Turadi';
                                    } else if ($data->ayol_daftar == \common\models\People::AYOL_DAFTAR_FALSE) {
                                        return 'Turmaydi';
                                    }
                                }
                            ],
                            [
                                'attribute' => 'temir_daftar',
                                'value' => function ($data) {
                                    if ($data->temir_daftar == \common\models\People::TEMIR_DAFTAR_TRUE) {
                                        return 'Turadi';
                                    } else if ($data->temir_daftar == \common\models\People::TEMIR_DAFTAR_FALSE) {
                                        return 'Turmaydi';
                                    }
                                }
                            ],
                            [
                                'attribute' => 'temir_daftar',
                                'value' => function ($data) {
                                    if ($data->yoshlar_daftar == \common\models\People::YOSHLAR_DAFTAR_TRUE) {
                                        return 'Turadi';
                                    } else if ($data->yoshlar_daftar == \common\models\People::YOSHLAR_DAFTAR_FALSE) {
                                        return 'Turmaydi';
                                    }
                                }
                            ],
                            'height',
                            'weight',
                            'blood_pressure',
                            'saturation',
                            'pulse',
                        ],
                    ]);

                    ?>



                </div>
            </div>
        </div>
    </div>
</div>

