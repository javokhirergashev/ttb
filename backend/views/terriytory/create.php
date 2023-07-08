<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Territory $model */

$this->title = 'Create Territory';
$this->params['breadcrumbs'][] = ['label' => 'Territories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="territory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
