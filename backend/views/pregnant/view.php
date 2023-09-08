<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Pregnant $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pregnants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="pregnant-view">

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
            'id',
            'person_id',
            'diagnosis_id',
            'description',
            'height',
            'weight_height_index',
            'weight',
            'pulse',
            'blood_pressure',
            'pregnant_week',
            'utt_conclusion:ntext',
            'stomach_diameter',
        ],
    ]) ?>

</div>
