<?php

use common\models\DiagnosisList;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\DiagnosisListSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Diagnosis Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosis-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Diagnosis List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'diagnosis_class_id',
            'diagnosis_group_id',
            'name',
            'description',
            //'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, DiagnosisList $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
