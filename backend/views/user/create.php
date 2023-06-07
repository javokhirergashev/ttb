<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\UserCreateForm $model */

$this->title = 'Create User Create Form';
$this->params['breadcrumbs'][] = ['label' => 'User Create Forms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create-form-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
