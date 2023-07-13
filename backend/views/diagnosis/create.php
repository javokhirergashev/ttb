<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Diagnosis $model */

$this->title = 'Create Diagnosis';
$this->params['breadcrumbs'][] = ['label' => 'Diagnoses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosis-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
