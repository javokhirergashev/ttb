<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DiagnosisList $model */

$this->title = 'Create Diagnosis List';
$this->params['breadcrumbs'][] = ['label' => 'Diagnosis Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosis-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
