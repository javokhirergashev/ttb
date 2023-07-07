<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Qvp $model */

$this->title = 'Create Qvp';
$this->params['breadcrumbs'][] = ['label' => 'Qvps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="qvp-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
