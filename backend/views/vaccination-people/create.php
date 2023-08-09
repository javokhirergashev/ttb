<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\VaccinationPeople $model */

$this->title = 'Create Vaccination People';
$this->params['breadcrumbs'][] = ['label' => 'Vaccination Peoples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vaccination-people-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
