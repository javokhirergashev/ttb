<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\VaccinationPeople $model */
/** @var $person */

$this->title =  $person->first_name .' '. $person->last_name . 'ni emlash amaliyotini bajarish';
$this->params['breadcrumbs'][] = ['label' => 'Vaccination Peoples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vaccination-people-create">
    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['/']) ?>">Bosh sahifa </a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['vaccination-people/people']) ?>">Emlash </a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active"><?= Html::encode($this->title) ?></li>
                </ul>
            </div>
        </div>
    </div>
    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
        'person' => $person,
    ]) ?>

</div>
