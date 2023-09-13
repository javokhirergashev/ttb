<?php
/**
 * @var $dataProvider \yii\data\ActiveDataProvider
 * @var $model        \common\models\WorkingHour
 * @var $user      \common\models\User
 * @var $searchModel  \common\models\search\WorkingHourSearch
 */;

$startTimestamp = strtotime(date('Y-m-d 00:00:00', strtotime($searchModel->date)));
$endTimestamp = strtotime(date('Y-m-d 23:59:59', strtotime($searchModel->date)));

?>

<div class="content">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= Yii::$app->request->referrer ?>">Hodimlar</a>
                    </li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active"><?= $user->getFullName() ?></li>
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
                                            <form method="get">
                                                <div class="d-flex">
                                                    <div class="" style="margin-left: 10px;">
                                                        <input type="date" class="date-search"
                                                               name="WorkingHourSearch[date]"
                                                               value="<?= $searchModel->date ?>"
                                                               placeholder="Sanani tanlang">
                                                        <input type="hidden" value="<?= $user->id ?>" name="id">
                                                    </div>
                                                    <div style="margin-left: 15px">
                                                        <input type="submit" class="btn btn-success date-search"
                                                               value="Izlash">
                                                    </div>
                                                    <div class="justify-content-center">
                                                        <a title="Tozalash" href="<?= \yii\helpers\Url::to(['user/table-view','id' => $user->id]) ?>"
                                                           class="btn doctor-refresh ms-2"><img
                                                                    src="/backend-files/img/icons/re-fresh.svg" alt=""></a>
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
                                <th>Sana</th>
                                <th>Vaqti</th>
                                <th>Holati</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($dataProvider->getModels() as $index => $model): ?>
                                <tr>
                                    <td><?= $model->id; ?></td>
                                    <td class="profile-image">
                                        <?= date('d-m-Y', $model->created_at) ?>
                                    </td>
                                    <td><?= date('H:i', $model->created_at) ?></td>
                                    <td></td>
                                    <td><?= $model->type == \common\models\WorkingHour::TYPE_ENTER ? '<span
                                                class="badge badge-success">Keldi</span>' : '<span
                                                class="badge badge-danger">Ketdi</span>'; ?>
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
