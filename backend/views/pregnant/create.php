<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Pregnant $model */
/** @var common\models\Pregnant $person */

$this->title = $person->first_name .' '. $person->last_name .'ning homiladorlik ko\'ruvi';
$this->params['breadcrumbs'][] = ['label' => 'Pregnants', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pregnant-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'person_id' => $person->id,
    ]) ?>

</div>
