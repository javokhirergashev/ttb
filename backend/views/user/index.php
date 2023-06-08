<?php

use yii\grid\GridView;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\search\UserCreateFormSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Foydalanuvchilar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create-form-index">

   <div class="page-header">
      <div class="row">
         <div class="col-sm-12">
            <ul class="breadcrumb">
               <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['site/index']) ?>">Dashboard </a>
               </li>
               <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
               <li class="breadcrumb-item active"><?= Html::encode($this->title) ?></li>
            </ul>
         </div>
      </div>
   </div>
   <h3><?= Html::encode($this->title) ?></h3>

   <p>
      <?= Html::a('Yangi foydalanuvchi yaratish', ['create'], ['class' => 'btn btn-success']) ?>
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
                     'first_name',
                     'last_name',
                     'username',
                     'email:email',
                     'phone_number',
                     'lat',
                     'lon',
                     [
                        'attribute' => 'role',
                        'value' => function ($data) {
                           if ($data->role == 1) {
                              return 'admin';
                           } elseif ($data->role == 2) {
                              return 'meneger';
                           } elseif ($data->role == 3) {
                              return 'statist';
                           } elseif ($data->role == 4) {
                              return 'shifokor';
                           } elseif ($data->role == 5) {
                              return 'hamshira';
                           }
                        }
                     ],
                     //'auth_key',
//                            'created_at',
                     //'verification_token',
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
                        'filter' => [\common\models\User::STATUS_ACTIVE => 'Faol',\common\models\User::STATUS_INACTIVE => 'Faol emas']
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
                                    <a href="/{$controller}/delete?id={$model->id}" data-method="post" id="{$controller}{$model->id}" data-postID="{$model->id}" data-postType="{$controller}" class="btn btn-danger postRemove"><i class="far fa-trash-alt"></i></a>
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
