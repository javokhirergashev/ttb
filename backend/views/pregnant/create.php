<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Pregnant $model */

$this->title = 'Create Pregnant';
$this->params['breadcrumbs'][] = ['label' => 'Pregnants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pregnant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
