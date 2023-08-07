<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\DisablityClass $model */

$this->title = 'Create Disablity Class';
$this->params['breadcrumbs'][] = ['label' => 'Disablity Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disablity-class-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
