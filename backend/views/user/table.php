<?php
/**
 * @var $dataProvider \yii\data\ActiveDataProvider
 * @var $model        \common\models\User
 * @var $searchModel  \common\models\search\UserSearch
 */;

$startTimestamp = strtotime(date('Y-m-d 00:00:00', strtotime($searchModel->date)));
$endTimestamp = strtotime(date('Y-m-d 23:59:59', strtotime($searchModel->date)));
?>

<div class="content">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="patients.html">Hodimlar</a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active">Hodimlar kelib ketish jadvali</li>
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
                                    <div class="doctor-search-blk">
                                        <div class="top-nav-searchs table-search-blk">
                                            <form method="get" action="table">
                                                <div class="d-flex">
                                                    <div class="">
                                                        <input type="text" value="<?= $searchModel->full_name ?>"
                                                               name="UserSearch[full_name]"
                                                               class="form-control"
                                                               placeholder="Search here">
                                                        <a class="btn"><img src="assets/img/icons/search-normal.svg"
                                                                            alt="">
                                                        </a>
                                                    </div>
                                                    <div class="" style="margin-left: 10px;">
                                                        <input type="date" class="date-search" name="UserSearch[date]"
                                                               value="<?= $searchModel->date ?? date('Y-m-d') ?>"
                                                               placeholder="Sanani tanlang">
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>
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
                                <th>Kelgan vaqt</th>
                                <th>Ketgan vaqt</th>
                                <th>Hozrgi holati</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($dataProvider->getModels() as $index => $model): ?>
                                <tr>
                                    <td><?= $model->id; ?></td>
                                    <td class="profile-image">
                                        <a href="<?= \yii\helpers\Url::to(['user/table-view','id' => $model->id]) ?>">
                                            <?= $model->first_name . " " . $model->last_name ?>
                                        </a>
                                    </td>
                                    <td><?php $time = $model->getWorkingHourEnter()->andWhere(['between', 'created_at', $startTimestamp, $endTimestamp])->orderBy(['id' => SORT_ASC])->one();
                                        if ($time) {
                                            echo $time ? date('H:i', $time->created_at) : "-----";
                                        } else {
                                            echo "---- ----";
                                        }
                                        ?></td>
                                    <td><?php $time = $model->getWorkingHours()->andWhere(['type' => \common\models\WorkingHour::TYPE_EXIT])->andWhere(['between', 'created_at', $startTimestamp, $endTimestamp])
                                            ->orderBy(['id' => SORT_DESC])->one();
                                        if ($time) {
                                            echo $time ? date('H:i', $time->created_at) : "-----";
                                        } else {
                                            echo "---- ----";
                                        }
                                        ?></td>
                                    <td><?php $time = $model->getWorkingHours()->orderBy(['id' => SORT_DESC])
                                            ->andWhere(['between', 'created_at', $startTimestamp, $endTimestamp])
                                            ->one();
                                        if ($time) {
                                            echo $time->type == \common\models\WorkingHour::TYPE_ENTER ? '<span class="badge badge-success">Keldi</span>' : '<span class="badge badge-danger">Ketdi</span>';
                                        } else {
                                            echo "---- ----";
                                        }
                                        ?></td>
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
