<?php

use common\models\Reference;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\ReferenceDiagnosis $model */
/** @var yii\widgets\ActiveForm $form */
/** @var \common\models\People $people */
/** @var \common\models\ReferenceDiagnosis[] $referenceDiagnosis */
/** @var \common\models\Reference[] $reference */
$this->title = 'Malumotnomalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="diagnosis-form">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row card-box">
        <h3><strong class="font-weight-normal"> FIO</strong>
            : <?= $people->first_name . " " . $people->last_name . " " . $people->middle_name ?></h3>
        <h3><strong class="font-weight-normal"> Tugilgan yili</strong> : <?= $people->birthday ?> </h3>
        <div class="text-end">
            <a
                    href="<? Url::to(['reference/pdf', 'id' => $model->id]) ?>"
                    class="text-end me-2"><img src="/backend-files/img/icons/pdf-icon-01.svg"
                                               alt=""></a>
        </div>
        <?php if ($reference->status == Reference::STATUS_START): ?>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-form-label">Tashxis</label>
                    <div class="col-md-9">
                        <?= $form->field($model, 'diagnosis')->textarea()->label(false) ?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-form-label">Shifokor</label>
                    <div class="col-md-9">
                        <?= $form->field($model, 'position')->dropDownList(\common\models\ReferenceDiagnosis::getPositionList())->label(false) ?>
                    </div>
                </div>
            </div>

            <div class="form-group text-end">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-success']) ?>

            </div>
        <?php endif; ?>
    </div>
    <?php ActiveForm::end(); ?>

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table show-entire">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table border-0 custom-table comman-table datatable mb-0">
                            <thead>
                            <tr>
                                <th>
                                    №
                                </th>
                                <th>Shifokor</th>
                                <th>Tashxis</th>
                                <th>Shifokor FIO</th>
                                <th>Yaratilgan vaqti</th>
                                <th class="text-center">Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($referenceDiagnosis as $index => $diagnosis): ?>
                                <tr>
                                    <td><?= $diagnosis->id; ?></td>
                                    <td class="profile-image">
                                        <?= $diagnosis->getPositionName() ?>
                                    </td>
                                    <td><?= $diagnosis->diagnosis ?></td>
                                    <td><?= $diagnosis->createdBy->getFullName() ?? "--- ---" ?></td>
                                    <td><?= date('d.m.Y H:i', $diagnosis->created_at) ?></td>
                                    <?php if ($diagnosis->created_by == Yii::$app->user->id): ?>
                                        <td class="text-center"><a
                                                    href="<? Url::to(['reference/pdf', 'id' => $model->id]) ?>"
                                                    class="btn btn-success me-2"><i class="fa fa-edit"></i></a></td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

