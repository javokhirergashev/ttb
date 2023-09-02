<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Reference $model */

$this->title = 'Update Reference: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'References', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="reference-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
