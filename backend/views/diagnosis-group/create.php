<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DiagnosisGroup $model */

$this->title = 'Create Diagnosis Group';
$this->params['breadcrumbs'][] = ['label' => 'Diagnosis Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosis-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
