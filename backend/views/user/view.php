<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\UserCreateForm $model */

$this->title = $model->first_name . ' ' . $model->last_name;
$this->params['breadcrumbs'][] = ['label' => 'User Create Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="user-create-form-view">
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
        <?= Html::a('Tahrirlash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <div class="table-responsive p-5">
                    <?= DetailView::widget([
                        'model' => $model,
                        'attributes' => [
//                            'id',
                            'phone_number',
                            'first_name',
                            'last_name',
                            'email:email',
                            'username',
                            [
                                'attribute' => 'gender',
                                'value' => function ($data) {
                                    if ($data->gender == \common\models\UserCreateForm::GENDER_MALE) {
                                        return 'erkak';
                                    } else {
                                        return 'ayol';
                                    }
                                }
                            ],
                            [
                                'attribute' => 'birthday',
                                'format' => ['date', 'php:d.m.Y']
                            ],
                            'rate',
                            [
                                'attribute' => 'retired',
                                'value' => function ($data) {
                                    if ($data->retired == \common\models\UserCreateForm::RETIRED_TRUE) {
                                        return 'Nafaqada';
                                    } else {
                                        return 'Nafaqa yoshida emas';
                                    }
                                }
                            ],
                            [
                                'attribute' => 'category',
                                'value' => function ($data) {
                                    if ($data->category == \common\models\UserCreateForm::WITHOUT_CATEGORY) {
                                        return 'Yo\'q';
                                    } else if ($data->category == \common\models\UserCreateForm::FIRST_CATEGORY) {
                                        return '1-toifa';
                                    } else if ($data->category == \common\models\UserCreateForm::SECOND_CATEGORY) {
                                        return '2-toifa';
                                    } else {
                                        return 'oliy toifa';
                                    }
                                }
                            ],
                            [
                                'attribute' => 'decree',
                                'value' => function ($data) {
                                    if ($data->decree == \common\models\UserCreateForm::DEPUTY_TRUE) {
                                        return 'Dekretda';
                                    } else {
                                        return 'Dekretda emas';
                                    }
                                }
                            ],
                            [
                                'attribute' => 'disabled',
                                'value' => function ($data) {
                                    if ($data->disabled == \common\models\UserCreateForm::DISABLED_FALSE) {
                                        return 'Yo\'q';
                                    } else {
                                        return 'Bor';
                                    }
                                }
                            ],
                            [
                                'attribute' => 'deputy',
                                'value' => function ($data) {
                                    if ($data->deputy == \common\models\UserCreateForm::DEPUTY_FALSE) {
                                        return 'Yo\'q';
                                    } else {
                                        return 'Bor';
                                    }
                                }
                            ],
                            [
                                'attribute' => 'qualification_date',
                                'format' => ['date', 'php:d.m.Y']
                            ],
                            [
                                'attribute' => 'district_id',
                                'value' => function ($data) {
                                    return $data->district->name[Yii::$app->language];
                                }
                            ],
                            [
                                'attribute' => 'qvp_id',
                                'value' => function ($data) {
                                    return $data->qvp->title;
                                }
                            ],
                            'telegram_link',
                            'instagram_link',
                            'facebook_link',
                            'twitter_link',
//            'type',
                            [
                                'attribute' => 'role',
                                'value' => function ($data) {
                                    return Yii::$app->user->identity->getRoleName();
                                }
                            ],
//            'auth_key',
//            'password_hash',
                            [
                                'attribute' => 'created_at',
                                'format' => ['datetime', 'php:d.m.Y H:m']
                            ],
                            [
                                'attribute' => 'updated_at',
                                'format' => ['datetime', 'php:d.m.Y H:m']
                            ],
                            [
                                'attribute' => 'deleted_at',
                                'format' => ['datetime', 'php:d.m.Y H:m']
                            ],
//            'avatar_id',
                            [
                                'attribute' => 'status',
                                'value' => function ($data) {
                                    if ($data->status == \common\models\User::STATUS_ACTIVE) {
                                        return '<span class="badge badge-success">Faol</span>';
                                    } else {
                                        return '<span class="badge badge-danger">Faol emas</span>';
                                    }
                                },
                                'format' => 'raw',
                                'filter' => [\common\models\User::STATUS_ACTIVE => 'Faol', \common\models\User::STATUS_INACTIVE => 'Faol emas']
                            ],

//            'verification_token',
                            [
                                'attribute' => 'position_id',
                                'value' => function ($data) {
                                    return $data->position->title[Yii::$app->language];
                                }
                            ],
                            'avatar',
                        ],
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
