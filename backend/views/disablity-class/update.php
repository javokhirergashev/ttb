<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DisablityClass $model */

$this->title = 'Update Disablity Class: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Disablity Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="disablity-class-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
