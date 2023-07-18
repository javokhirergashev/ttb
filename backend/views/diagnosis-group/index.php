<?php

use common\models\DiagnosisGroup;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\DiagnosisGroupSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Diagnosis Groups';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosis-group-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Diagnosis Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'diagnosis_class_id',
            'name',
            'description',
            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, DiagnosisGroup $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
