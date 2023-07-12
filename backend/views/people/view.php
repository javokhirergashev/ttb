<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\People $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Peoples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="people-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

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
                    }else{
                        return 'faol emas';
                    }
                }
            ],
            'pinfl',
            'passport_number',
            'phone_number',
            'birthday',
            [
                'attribute' => 'region_id',
                'value' => function($data){
                    return \common\modules\country\models\Region::findOne($data->region_id)->name[\Yii::$app->language];
                }
            ],
            [
                'attribute' => 'district_id',
                'value' => function($data){
                    return \common\modules\country\models\District::findOne($data->district_id)->name[\Yii::$app->language];
                }
            ],
            [
                'attribute' => 'quarter_id',
                'value' => function($data){
                    return \common\modules\country\models\Quarter::findOne($data->quarter_id)->name[\Yii::$app->language];
                }
            ],
            [
                'attribute' => 'qvp_id',
                'value' => function($data){
                    return \common\models\Qvp::findOne($data->qvp_id)->title;
                }
            ],
            'metrka_number',
            [
                'attribute' => 'gender',
                'value' => function ($data) {
                    if ($data->status == \common\models\People::GENDER_MALE) {
                        return 'erkak';
                    }else{
                        return 'ayol';
                    }
                }
            ],
            [
                'attribute' => 'territory_code',
                'value' => function($data){
                    return \common\models\Territory::findOne($data->territory_code)->name;
                }
            ],
        ],
    ]) ?>

</div>
