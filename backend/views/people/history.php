<?php
/**
 * @var $dataProvider \yii\data\ActiveDataProvider
 * @var $people \common\models\People
 */


?>

<div class="content">
    <div class="row">
        <div class="col-sm-7 col-6">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['diagnosis/people']) ?>">Aholi ro'yxati </a>
                </li>
                <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                <li class="breadcrumb-item active"><?= $people->first_name . " " . $people->last_name ?></li>
            </ul>
        </div>
    </div>
    <div class="card-box profile-header pb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-view">
                    <div class="profile-img-wrap">
                        <div class="profile-img">
                            <a href="#"><img class="avatar" src="assets/img/doctor-03.jpg" alt=""></a>
                        </div>
                    </div>
                    <div class="profile-basic">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="profile-info-left">
                                    <h3 class="user-name m-t-0 mb-0"><?= $people->first_name . " " . $people->last_name ?></h3>
                                    <small
                                            class="text-muted"><?= $people->passport_number ? $people->passport_number : $people->metrka_number ?></small>
                                    <div class="staff-id">Aholi ID : DR-<?= $people->id ?></div>

                                </div>
                            </div>
                            <div class="col-md-7">
                                <ul class="personal-info">
                                    <li>
                                        <span class="title"><?= Yii::t('app', 'Phone') ?>:</span>
                                        <span class="text"><a href="#"><?= $people->phone_number ?></a></span>
                                    </li>
                                    <li>
                                        <span class="title">Tugilgan yili:</span>
                                        <span class="text"><?= $people->birthday ?? "---- ----" ?></span>
                                    </li>
                                    <li>
                                        <span class="title"><?= Yii::t('app', 'Tuman') ?>:</span>
                                        <span class="text"><a href="#"><span class="__cf_email__"
                                                ><?= $people->district_id ? $people->district->name[Yii::$app->language] : " ---- ----" ?></span></a></span>
                                    </li>
                                    <li>
                                        <span class="title">Mahallasi:</span>
                                        <span class="text"><?= $people->quarter_id ? $people->quarter->name[Yii::$app->language] : "---- ----" ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="profile-tabs mt-3">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table show-entire">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table border-0 custom-table comman-table datatable mb-0">
                                <thead>
                                <tr>
                                    <th>
                                        Id
                                    </th>
                                    <th>Tashxis</th>
                                    <th>Yaratilgan vaqti</th>
                                    <th>Tashxis sinfi</th>

                                    <th class="text-end">Yuklab olish</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                foreach ($dataProvider->getModels() as $index => $model): ?>
                                    <tr>
                                        <td><?= $index + 1 ; ?></td>
                                        <td class="profile-image">
                                            <?= $model->title ?>
                                        </td>
                                        <td><?= date("d.m.Y", $model->created_at) ?></td>
                                        <td><?= $model->diagnosis_list_id ? $model->diagnosisList->name : " ---- ----" ?></td>

                                        <td class="text-end" title="PDF">
                                            <a href="javascript:;" class=" me-2"><img
                                                        src="/backend-files/img/icons/pdf-icon-01.svg"
                                                        alt=""></a>
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
</div>