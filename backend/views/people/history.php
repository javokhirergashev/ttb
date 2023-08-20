<?php
/**
 * @var $dataProvider \yii\data\ActiveDataProvider
 * @var $referralProvider \yii\data\ActiveDataProvider
 * @var $vaccinationProvider \yii\data\ActiveDataProvider
 * @var $people \common\models\People
 * @var $vaccinationPeople \common\models\VaccinationPeople
 * @var $referral \common\models\Referral
 */


?>

<div class="content">
    <div class="row">
        <div class="col-sm-7 col-6">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['diagnosis/people']) ?>">Aholi
                        ro'yxati </a>
                </li>
                <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                <li class="breadcrumb-item active"><?= $people->first_name . " " . $people->last_name ?></li>
            </ul>

            <form method="post" action="<?= \yii\helpers\Url::to(['people/history', 'id' => $people->id]) ?>"
                  enctype="multipart/form-data">
                <input type="file" name="excel">
                <input type="submit">
            </form>
        </div>
    </div>
    <div class="card-box profile-header pb-3">
        <div class="row">
            <div class="col-md-12">
                <div class="profile-view">
                    <div class="profile-img-wrap">
                        <div class="profile-img pb-3">
                            <a href="#"><img class="avatar mb-3" src="assets/img/doctor-03.jpg" alt=""></a>

                        </div>
                    </div>


                    <div class="profile-basic mb-3">
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
    <div class="profile-tabs">

        <ul class="nav nav-tabs nav-tabs-bottom pt-5">
            <li class="nav-item"><a class="nav-link active" href="#about-cont" data-bs-toggle="tab">Tashxislar</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-bs-toggle="tab">Yo'llanmalar</a></li>
            <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-bs-toggle="tab">Emlanishlar</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane show active" id="about-cont">
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
                                                <td><?= $index + 1; ?></td>
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
            <div class="tab-pane" id="bottom-tab2">
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
                                            <th>Doktor FIO</th>
                                            <th>Klinika</th>
                                            <th>Bo'lim</th>
                                            <th>Muddati</th>
                                            <th>Yo'llanma vaqti</th>
                                            <th class="text-center">Holati</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($referralProvider->getModels() as $index => $referral): ?>
                                            <tr>
                                                <td><?= $index + 1; ?></td>
                                                <td>
                                                    <?= $referral->comment ?>
                                                </td>
                                                <td>
                                                    <?= $referral->createdBy->getFullName() ?>
                                                </td>
                                                <td>
                                                    <?= $referral->clinic_id ? $referral->clinic->name : "--- ---" ?>
                                                </td>
                                                <td>
                                                    <?= $referral->section_id ? $referral->section->name : "--- ---" ?>
                                                </td>
                                                <td>
                                                    <?= $referral->day_count ?>
                                                </td>
                                                <td><?= date("d.m.Y", $referral->created_at) ?></td>

                                                <td class="text-center" title="PDF">
                                                    <?= $referral->getStatusName() ?>
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
            <div class="tab-pane" id="bottom-tab3">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table show-entire">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table border-0 custom-table comman-table datatable mb-0">
                                        <thead>
                                        <tr>
                                            <th>Nomer</th>
                                            <th>Emlash nomi</th>
                                            <th>Emlangan vaqti</th>
                                            <th>Yoshi</th>
                                            <th>Preparat nomi</th>
                                            <th>Olish yoshi</th>
                                            <th class="text-center">Seriya</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($vaccinationProvider->getModels() as $index => $vaccinationPeople): ?>
                                            <tr>
                                                <td><?= $index + 1; ?></td>
                                                <td class="profile-image">
                                                    <a href="<?= \yii\helpers\Url::to(['people/history', 'id' => $vaccinationPeople->id]) ?>">
                                                        <?= $vaccinationPeople->vaccination->name ?>
                                                    </a>
                                                </td>
                                                <td><?= date("d.m.Y", $vaccinationPeople->created_at) ?></td>
                                                <td><?= $vaccinationPeople->vaccination->id ?></td>
                                                <td><?= $vaccinationPeople->preparat_name ?></td>
                                                <td><?= $vaccinationPeople->vaccination->time ?></td>
                                                <td class="text-center">
                                                    <?= $vaccinationPeople->seria ?>
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

    </div>
</div>