<?php

use common\models\Queue;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\QueueSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Queues';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="queue-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Queue', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'reason',
            'service_id',
            'user_id',
            'status',
            //'writing_time:datetime',
            //'created_at',
            //'updated_at',
            //'first_name',
            //'last_name',
            //'phone_number',
            //'number',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Queue $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
