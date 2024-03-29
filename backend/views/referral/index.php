<?php

use common\models\Referral;

/** @var yii\web\View $this */
/** @var common\models\search\ReferralSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var $model  Referral */

$this->title = 'Referrals';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="referral-index">
    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table show-entire">
                <div class="card-body">
                    <div class="page-table-header mb-2">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="doctor-table-blk">
                                    <h3>Yo'naltirilganlar</h3>
                                    <div class="doctor-search-blk">
                                        <div class="top-nav-search table-search-blk">
                                            <form>
                                                <input type="text" value="<?= $searchModel->first_name ?>"
                                                       name="ReferralSearch[first_name]"
                                                       class="form-control"
                                                       placeholder="Search here">
                                                <a class="btn"><img src="assets/img/icons/search-normal.svg"
                                                                    alt=""></a>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="javascript:;" class=" me-2"><img
                                            src="/backend-files/img/icons/pdf-icon-01.svg"
                                            alt=""></a>
                                <a href="javascript:;" class=" me-2"><img
                                            src="/backend-files/img/icons/pdf-icon-02.svg"
                                            alt=""></a>
                                <a href="javascript:;" class=" me-2"><img
                                            src="assets/img/icons/pdf-icon-03.svg"
                                            alt=""></a>
                                <a href="javascript:;"><img src="assets/img/icons/pdf-icon-04.svg"
                                                            alt=""></a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table border-0 custom-table comman-table datatable mb-0">
                            <thead>
                            <tr>
                                <th>
                                    Nomer
                                </th>
                                <th>FIO</th>
                                <th>Yo'naltirilgan vaqti</th>
                                <th>Doctor</th>
                                <th>Yotish kuni</th>
                                <th>Klinika nomi</th>
                                <th>Bolim nomi</th>
                                <th>Holati</th>
                                <th class="text-end">Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach ($dataProvider->getModels() as $index => $model): ?>
                                <tr>
                                    <td><?= $index + 1; ?></td>
                                    <td class="profile-image">
                                        <a href="<?= \yii\helpers\Url::to(['people/history', 'id' => $model->people_id]) ?>">
                                            <?= $model->people->first_name . " " . $model->people->last_name ?>
                                        </a>
                                    </td>
                                    <td><?= date("d.m.Y", $model->created_at) ?></td>
                                    <td><?= $model->createdBy->getFullName() ?></td>
                                    <td><?= $model->day_count ?? "-- --" ?></td>
                                    <td><?= $model->clinic->name ?></td>
                                    <td><?= $model->section->name ?></td>
                                    <td><?= $model->getStatusName() ?></td>
                                    <td class="text-end">
                                        <a href="<?= \yii\helpers\Url::to(['referral/view', 'id' => $model->id]) ?>"
                                           title="korish"
                                           class="btn btn-info add-pluss ms-2 text-white"><i class="fa fa-eye"></i></a>

                                        <?php if ($model->status < Referral::STATUS_ACCEPTED): ?>
                                            <a data-bs-toggle="modal"
                                               data-bs-target="#staticBackdrop"
                                               title="Bekor qilish"
                                               href="!#"
                                               data-value="<?= $model->id ?>"
                                               class="btn btn-danger add-pluss ms-2 cancel-button"><i
                                                        class="fa fa-times"></i></a>
                                        <?php endif; ?>
                                        <a title="Chop etish" target="_blank"
                                           href="<?= \yii\helpers\Url::to(['referral/pdf', 'id' => $model->id]) ?>"
                                           data-value="<?= $model->id ?>"
                                           class="btn btn-secondary add-pluss ms-2 cancel-button"><i
                                                    class="fa fa-print"></i></a>
                                        <?php if ($model->status === Referral::STATUS_ACCEPTED): ?>
                                            <a title="Honaga joylash"
                                               href="<?= $model->status == Referral::STATUS_ACCEPTED ? \yii\helpers\Url::to(['referral/room-people', 'id' => $model->id]) : '' ?>"
                                               class="btn btn-success add-pluss ms-2"><i
                                                        class="fa fa-hotel"></i></a>
                                        <?php elseif ($model->status == Referral::STATUS_LOCATION) : ?>
                                            <a style="display:none"
                                               href="<?= \yii\helpers\Url::to(['referral/exit', 'id' => $model->id]) ?>"
                                               title="Chiqarib yuborish"
                                               class="btn btn-primary add-pluss ms-2"><i
                                                        class="fa fa-right-long"></i></a>

                                        <?php elseif ($model->status == Referral::STATUS_EXIT): ?>

                                            <?php echo " " ?>
                                        <?php else : ?>
                                            <a href="<?= \yii\helpers\Url::to(['referral/accept', 'id' => $model->id]) ?>"
                                               title="Tasdiqlash"
                                               class="btn btn-primary add-pluss ms-2"><i class="fa fa-check"></i></a>
                                        <?php endif; ?>
                                    </td>
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

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
     aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="staticBackdropLabel">Yo'llanmani bekor qilish</h4>

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php $form = \yii\widgets\ActiveForm::begin(['method' => 'POST', 'action' => 'cancel', 'options' => ['id' => 'cancel-form']]) ?>
                <div class="mb-3">
                    <label for="message-text" class="col-form-label">Sababi:</label>
                    <textarea class="form-control" name="reason" id="message-text"></textarea>
                    <input type="hidden" id="hidden-cancel-id" name="id">
                </div>

                <?php \yii\widgets\ActiveForm::end() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close
                </button>
                <button type="submit" id="form-modal-cancel" class="btn btn-primary">Send message</button>
                <div>
                </div>

            </div>
        </div>
    </div>
</div>
