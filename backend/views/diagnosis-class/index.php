<?php

use common\models\DiagnosisClass;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\DiagnosisClassSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Diagnosis Classes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosis-class-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Diagnosis Class', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, DiagnosisClass $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
