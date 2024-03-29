<?php
/**
 * @var $dataProvider \yii\data\ActiveDataProvider
 * @var $model        \common\models\People
 * @var $searchModel  \common\models\search\PeopleSearch
 */
?>


<div class="content">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="patients.html">Patients</a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active">Patient List</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table show-entire">
                <div class="card-body">
                    <div class="page-table-header mb-2">
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="doctor-table-blk">
                                    <h3>Patient List</h3>
                                    <div class="doctor-search-blk">
                                        <div class="top-nav-search table-search-blk">
                                            <form method="get" action="people">
                                                <input type="text" value="<?= $searchModel->full_name ?>"
                                                       name="PeopleSearch[full_name]"
                                                       class="form-control"
                                                       placeholder="Search here">
                                                <a class="btn"><img src="assets/img/icons/search-normal.svg"
                                                                    alt="">
                                                </a>
                                            </form>
                                        </div>
                                        <div class="add-group">
                                            <a href="<?= \yii\helpers\Url::to(['people/create']) ?>"
                                               class="btn btn-primary add-pluss ms-2"><img
                                                        src="/backend-files/img/icons/plus.svg" alt=""></a>
                                            <a href="<?= \yii\helpers\Url::to(['diagnosis/people']) ?>"
                                               class="btn btn-primary doctor-refresh ms-2"><img
                                                        src="/backend-files/img/icons/re-fresh.svg" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto text-end float-end ms-auto download-grp">
                                <a href="javascript:;" class=" me-2"><img src="assets/img/icons/pdf-icon-01.svg"
                                                                          alt=""></a>
                                <a href="javascript:;" class=" me-2"><img src="assets/img/icons/pdf-icon-02.svg"
                                                                          alt=""></a>
                                <a href="javascript:;" class=" me-2"><img src="assets/img/icons/pdf-icon-03.svg"
                                                                          alt=""></a>
                                <a href="javascript:;"><img src="assets/img/icons/pdf-icon-04.svg" alt=""></a>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table border-0 custom-table comman-table datatable mb-0">
                            <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>FIO</th>
                                <th>Tug'ilgan sana</th>
                                <th>Telefon nomeri</th>
                                <th>Passport seriyasi</th>
                                <th>Metrka</th>
                                <th>Qvp</th>
                                <th>MFY</th>
                                <th class="text-center">Amallar</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($dataProvider->getModels() as $index => $model): ?>
                                <tr>
                                    <td><?= $model->id; ?></td>
                                    <td class="profile-image">
                                        <a href="<?= \yii\helpers\Url::to(['people/history', 'id' => $model->id]) ?>">
                                            <?= $model->first_name . " " . $model->last_name . " " . $model->middle_name ?>
                                        </a>
                                    </td>
                                    <td><?= $model->birthday ?></td>
                                    <td><?= $model->phone_number ?></td>
                                    <td><?= $model->passport_number ?></td>
                                    <td><?= $model->metrka_number ?></td>
                                    <td><?= $model->qvp_id ? $model->qvp->title : " ---- ----" ?></td>
                                    <td><?= $model->quarter_id ? $model->quarter->name[Yii::$app->language] : " ---- ----" ?></td>
                                    <td class="text-end">
                                        <a href="<?= \yii\helpers\Url::to(['people/reference-create', 'id' => $model->id]) ?>"
                                           title="Ma'lumotnoma yaratish" class="btn btn-primary add-pluss ms-2"><i
                                                    class="fa fa-file-text"></i></a>
                                        <a href="<?= \yii\helpers\Url::to(['diagnosis/create', 'people_id' => $model->id]) ?>"
                                           title="Diagnost qo'shish" class="btn btn-primary add-pluss ms-2"><i
                                                    class="fa fa-plus"></i></a>
                                        <a  title="Ko'rish" href="<?= \yii\helpers\Url::to(['people/view', 'id' => $model->id]) ?>"
                                           class="btn btn-success add-pluss ms-2"><i class="fa fa-eye"></i></a>
                                        <a href="<?= \yii\helpers\Url::to(['referral/create', 'people_id' => $model->id]) ?>"
                                                   class="btn btn-info text-white  add-pluss ms-2"><i
                                                    class="fa fa-right-long"></i></a>
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
