<?php

use common\models\Reference;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var common\models\search\ReferenceSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var Reference $model */

$this->title = 'References';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="content">

    <div class="page-header">
        <div class="row">
            <div class="col-sm-12">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?= Url::to(['/']) ?>">Bosh sahifa</a></li>
                    <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                    <li class="breadcrumb-item active">Malumotnomalar</li>
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
                                    <h3>Malumotnoma ro'yxati</h3>
                                    <div class="doctor-search-blk">
                                        <div class="top-nav-search table-search-blk">
                                            <form method="get">
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
                                            <a href="<?= \yii\helpers\Url::to(['reference/index']) ?>"
                                               class="btn btn-primary doctor-refresh ms-2"><img
                                                        src="/backend-files/img/icons/re-fresh.svg" alt=""></a>
                                        </div>

                                    </div>
                                </div>
                                <div class="text-end">
                                    <a href="<?= \yii\helpers\Url::to(['diagnosis/people']) ?>" class="btn btn-primary btn-rounded"><i
                                                class="fa fa-plus"></i>Aholi ro'yhatiga o'tish</a>
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
                                <th>Malumotnoma turi</th>
                                <th>Berildi ushbu malumotnoma (qayerga)</th>
                                <th>Yaratilgan vaqti</th>
                                <th>Tashxislar soni</th>
                                <th class="text-center">Holati</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($dataProvider->getModels() as $index => $model): ?>
                            <tr>
                                <td><?= $model->id; ?></td>
                                <td class="profile-image">
                                    <a href="<?= \yii\helpers\Url::to(['reference/diagnosis-create', 'id' => $model->id]) ?>">
                                        <?= $model->people_id ? $model->people->getFullName() : " "; ?>
                                    </a>
                                </td>
                                <td><?= $model->getTypeName() ?></td>
                                <td><?= $model->where_to ?></td>
                                <td><?= date('d.m.Y H:i', $model->created_at) ?></td>
                                <td><?= $model->getReferenceDiagnosis()->count() ?? "---" ?></td>
                                <td class="text-center">
                                    <?php
                                    if ($model->status === Reference::STATUS_START):
                                        echo '<span class="badge badge-primary">Faol</span>';
                                        ?>
                                    <?php else : ?>
                                        <a href="<?= $model->status === Reference::STATUS_FINISHED ? Url::to(['reference/pdf', 'id' => $model->id]) : "#" ?>"
                                       class=" me-2"><img src="/backend-files/img/icons/pdf-icon-01.svg"
                                                          alt=""></a>
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

