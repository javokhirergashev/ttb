<?php
/**
 * @var $user \common\models\User
 * @var $dataProvider \yii\data\ActiveDataProvider
 * @var $historyProvider \yii\data\ActiveDataProvider
 * @var $model \common\models\Queue
 * @var $history \common\models\People
 */
?>

<div class="content">
    <div class="row">
        <div class="col-sm-7 col-6">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= \yii\helpers\Url::to(['site/index']) ?>">Dashboard </a></li>
                <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
                <li class="breadcrumb-item active">My Profile</li>
            </ul>
        </div>
        <div class="col-sm-5 col-6 text-end m-b-30">
            <a href="<?= \yii\helpers\Url::to(['user/profile-edite']) ?>" class="btn btn-primary btn-rounded"><i
                        class="fa fa-plus"></i>Profile
                o'zgartirish</a>
        </div>
    </div>
    <div class="card-box profile-header">
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
                                    <h3 class="user-name m-t-0 mb-0"><?= $user->first_name . " " . $user->last_name ?></h3>
                                    <small
                                            class="text-muted"><?= $user->position_id ? $user->position->title : "-------" ?></small>
                                    <div class="staff-id">Employee ID : DR-<?= $user->id ?></div>
                                    <div class="staff-msg"><a href="chat.html" class="btn btn-primary">Send Message</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <ul class="personal-info">
                                    <li>
                                        <span class="title"><?= Yii::t('app', 'Phone') ?>:</span>
                                        <span class="text"><a href="#"><?= $user->phone_number ?></a></span>
                                    </li>
                                    <li>
                                        <span class="title"><?= Yii::t('app', 'Email') ?>:</span>
                                        <span class="text"><a href="#"><span class="__cf_email__"
                                                ><?= $user->email ?? " ---- ----" ?></span></a></span>
                                    </li>
                                    <li>
                                        <span class="title">Birthday:</span>
                                        <span class="text"><?= $user->birthday ?? "---- ----" ?></span>
                                    </li>
                                    <li>
                                        <span class="title">Address:</span>
                                        <span class="text"><?= $user->address ?? "---- ----" ?></span>
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
        <ul class="nav nav-tabs nav-tabs-bottom">
            <li class="nav-item"><a class="nav-link active" href="#about-cont" data-bs-toggle="tab">Navbatdagilar</a>
            </li>
            <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-bs-toggle="tab">Ko'rilganlar</a></li>
            <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-bs-toggle="tab">Messages</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane show active" id="about-cont">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card card-table show-entire">
                            <div class="card-body">
                                <div class="page-table-header mb-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="doctor-table-blk">
                                                <h3>Navbat</h3>
                                                <div class="doctor-search-blk">
                                                    <div class="top-nav-search table-search-blk">
                                                        <form>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Search here">
                                                            <a class="btn"><img src="assets/img/icons/search-normal.svg"
                                                                                alt=""></a>
                                                        </form>
                                                    </div>
                                                    <div class="add-group">
                                                        <a href="<?= \yii\helpers\Url::to(['diagnosis/people']) ?>"
                                                           class="btn btn-primary">
                                                            <img
                                                                    src="/backend-files/img/icons/plus.svg"
                                                                    alt="">
                                                        </a>
                                                        <a href="javascript:;"
                                                           class="btn btn-primary doctor-refresh ms-2"><img
                                                                    src="/backend-files/img/icons/re-fresh.svg" alt="">
                                                        </a>
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
                                                Id
                                            </th>
                                            <th>FIO</th>
                                            <th>Yozilgan vaqti</th>
                                            <th>Telefon nomeri</th>
                                            <th>Passport seriyasi</th>
                                            <th>Tugilgan sanasi</th>
                                            <th>Address</th>
                                            <th class="text-end">Amallar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($dataProvider->getModels() as $index => $model): ?>
                                            <tr>
                                                <td><?= $model->id; ?></td>
                                                <td class="profile-image">
                                                    <a href="<?= \yii\helpers\Url::to(['people/history', 'id' => $model->id]) ?>">
                                                        <?= $model->first_name . " " . $model->last_name ?>
                                                    </a>
                                                </td>
                                                <td><?= date("d.m.Y", $model->writing_time) ?></td>
                                                <td><?= $model->phone_number ?></td>
                                                <td><?= $model->passport_number ?></td>
                                                <td><?= "Qvp  title" ?></td>
                                                <td><?= "Qvp  title" ?></td>
                                                <td class="text-end">
                                                    <a href="<?= \yii\helpers\Url::to(['diagnosis/create', 'people_id' => $model->people_id, 'queue_id' => $model->id]) ?>"
                                                       class="btn btn-primary add-pluss ms-2"><i class="fa fa-pen"></i></a>
                                                    <a title="Yo'naltirish"
                                                       href="<?= \yii\helpers\Url::to(['queue/view', 'id' => $model->id]) ?>"
                                                       class="btn btn-primary add-pluss ms-2"><i
                                                                class="fa fa-external-link"></i></a>
                                                    <a data-method="post"
                                                       href="<?= \yii\helpers\Url::to(['queue/delete', 'id' => $model->id]) ?>"
                                                       class="btn btn-danger add-pluss ms-2"><i
                                                                class="fa fa-times"></i></a>
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
                                <div class="page-table-header mb-2">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <div class="doctor-table-blk">
                                                <div class="doctor-search-blk">
                                                    <div class="top-nav-search table-search-blk">
                                                        <form>
                                                            <input type="text" class="form-control"
                                                                   placeholder="Search here">
                                                            <a class="btn"><img src="assets/img/icons/search-normal.svg"
                                                                                alt=""></a>
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
                                            <th>Tekshirilgan vaqti</th>
                                            <th>Telefon nomeri</th>
                                            <th>Passport seriyasi</th>
                                            <th>Tugilgan sanasi</th>
                                            <th>Address</th>
                                            <th class="text-end">Amallar</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        foreach ($historyProvider->getModels() as $index => $history): ?>
                                            <tr>
                                                <td><?= $history->id; ?></td>
                                                <td class="profile-image">
                                                    <a href="<?= \yii\helpers\Url::to(['people/view', 'id' => $history->id]) ?>">
                                                        <?= $history->first_name . " " . $history->last_name ?>
                                                    </a>
                                                </td>
                                                <td><?= date("d.m.Y", $history->getDiagnosis()->one()->created_at) ?></td>
                                                <td><?= $history->phone_number ?></td>
                                                <td><?= $history->passport_number ?? $history->metrka_number ?></td>
                                                <td><?= $history->birthday ?></td>
                                                <td><?= "test" ?></td>
                                                <td class="text-end">
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
                Tab content 3
            </div>
        </div>
    </div>
</div>
<div class="notification-box">
    <div class="msg-sidebar notifications msg-noti">
        <div class="topnav-dropdown-header">
            <span>Messages</span>
        </div>
        <div class="drop-scroll msg-list-scroll" id="msg_list">
            <ul class="list-box">
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">R</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author">Richard Miles </span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item new-message">
                            <div class="list-left">
                                <span class="avatar">J</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author">John Doe</span>
                                <span class="message-time">1 Aug</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">T</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author"> Tarah Shropshire </span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">M</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author">Mike Litorus</span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">C</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author"> Catherine Manseau </span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">D</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author"> Domenic Houston </span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">B</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author"> Buster Wigton </span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">R</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author"> Rolland Webber </span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">C</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author"> Claire Mapes </span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">M</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author">Melita Faucher</span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">J</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author">Jeffery Lalor</span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">L</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author">Loren Gatlin</span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="chat.html">
                        <div class="list-item">
                            <div class="list-left">
                                <span class="avatar">T</span>
                            </div>
                            <div class="list-body">
                                <span class="message-author">Tarah Shropshire</span>
                                <span class="message-time">12:28 AM</span>
                                <div class="clearfix"></div>
                                <span class="message-content">Lorem ipsum dolor sit amet, consectetur adipiscing</span>
                            </div>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="topnav-dropdown-footer">
            <a href="chat.html">See all messages</a>
        </div>
    </div>
</div>
</div>