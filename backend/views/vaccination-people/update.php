<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\VaccinationPeople $model */

$this->title = 'Update Vaccination People: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vaccination Peoples', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vaccination-people-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
