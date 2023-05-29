<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Queue $model */

$this->title = 'Create Queue';
$this->params['breadcrumbs'][] = ['label' => 'Queues', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="queue-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
