<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DiagnosisClass $model */

$this->title = 'Create Diagnosis Class';
$this->params['breadcrumbs'][] = ['label' => 'Diagnosis Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosis-class-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
