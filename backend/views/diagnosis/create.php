<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Diagnosis $model */
/** @var common\models\People $people */

$this->title = 'Create Diagnosis';
$this->params['breadcrumbs'][] = ['label' => 'Diagnoses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosis-create">


    <?= $this->render('_form', [
        'model' => $model,
        'people' => $people
    ]) ?>

</div>
