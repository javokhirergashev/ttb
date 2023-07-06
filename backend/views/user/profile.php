<?php
/**
 * @var $user \common\models\User
 */
?>

<div class="content">
   <div class="row">
      <div class="col-sm-7 col-6">
         <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Dashboard </a></li>
            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
            <li class="breadcrumb-item active">My Profile</li>
         </ul>
      </div>
      <div class="col-sm-5 col-6 text-end m-b-30">
         <a href="edit-profile.html" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
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
         <li class="nav-item"><a class="nav-link active" href="#about-cont" data-bs-toggle="tab">About</a></li>
         <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-bs-toggle="tab">Profile</a></li>
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
                                          <a href="add-patient.html"
                                             class="btn btn-primary add-pluss ms-2"><img
                                                src="assets/img/icons/plus.svg" alt=""></a>
                                          <a href="javascript:;"
                                             class="btn btn-primary doctor-refresh ms-2"><img
                                                src="assets/img/icons/re-fresh.svg" alt=""></a>
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
                                    <div class="form-check check-tables">
                                       <input class="form-check-input" type="checkbox" value="something">
                                    </div>
                                 </th>
                                 <th>FIO</th>
                                 <th>Yozilgan vaqti</th>
                                 <th>Telefon nomeri</th>
                                 <th>Passport seriyasi</th>
                                 <th>Tugilgan sanasi</th>
                                 <th>Address</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                 <td>
                                    <div class="form-check check-tables">
                                       <input class="form-check-input" type="checkbox" value="something">
                                    </div>
                                 </td>
                                 <td class="profile-image"><a href="profile.html"><img width="28" height="28"
                                                                                       src="assets/img/profiles/avatar-01.jpg"
                                                                                       class="rounded-circle m-r-5"
                                                                                       alt=""> Andrea Lalema</a>
                                 </td>
                                 <td>Otolaryngology</td>
                                 <td>Infertility</td>
                                 <td>MBBS, MS</td>
                                 <td><a href="javascript:;">+1 23 456890</a></td>
                                 <td><a href="https://preclinic.dreamguystech.com/cdn-cgi/l/email-protection"
                                        class="__cf_email__" data-cfemail="0b6e736a667b676e4b6e666a626725686466">[email&#160;protected]</a>
                                 </td>
                                 <td>01.10.2022</td>
                                 <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                       <a href="#" class="action-icon dropdown-toggle"
                                          data-bs-toggle="dropdown" aria-expanded="false"><i
                                             class="fa fa-ellipsis-v"></i></a>
                                       <div class="dropdown-menu dropdown-menu-end">
                                          <a class="dropdown-item" href="edit-patient.html"><i
                                                class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                          <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                             data-bs-target="#delete_patient"><i
                                                class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-check check-tables">
                                       <input class="form-check-input" type="checkbox" value="something">
                                    </div>
                                 </td>
                                 <td class="profile-image"><a href="profile.html"><img width="28" height="28"
                                                                                       src="assets/img/profiles/avatar-02.jpg"
                                                                                       class="rounded-circle m-r-5"
                                                                                       alt="">Smith Bruklin</a>
                                 </td>
                                 <td>Urology</td>
                                 <td>Prostate</td>
                                 <td>MBBS, MS</td>
                                 <td><a href="javascript:;">+1 23 456890</a></td>
                                 <td><a href="https://preclinic.dreamguystech.com/cdn-cgi/l/email-protection"
                                        class="__cf_email__" data-cfemail="c5a0bda4a8b5a9a085a0a8a4aca9eba6aaa8">[email&#160;protected]</a>
                                 </td>
                                 <td>01.10.2022</td>
                                 <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                       <a href="#" class="action-icon dropdown-toggle"
                                          data-bs-toggle="dropdown" aria-expanded="false"><i
                                             class="fa fa-ellipsis-v"></i></a>
                                       <div class="dropdown-menu dropdown-menu-end">
                                          <a class="dropdown-item" href="edit-patient.html"><i
                                                class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                          <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                             data-bs-target="#delete_patient"><i
                                                class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-check check-tables">
                                       <input class="form-check-input" type="checkbox" value="something">
                                    </div>
                                 </td>
                                 <td class="profile-image"><a href="profile.html"><img width="28" height="28"
                                                                                       src="assets/img/profiles/avatar-03.jpg"
                                                                                       class="rounded-circle m-r-5"
                                                                                       alt=""> William
                                       Stephin</a></td>
                                 <td>Radiology</td>
                                 <td>Cancer</td>
                                 <td>MBBS, MS</td>
                                 <td><a href="javascript:;">+1 23 456890</a></td>
                                 <td><a href="https://preclinic.dreamguystech.com/cdn-cgi/l/email-protection"
                                        class="__cf_email__" data-cfemail="32574a535f425e5772575f535b5e1c515d5f">[email&#160;protected]</a>
                                 </td>
                                 <td>01.10.2022</td>
                                 <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                       <a href="#" class="action-icon dropdown-toggle"
                                          data-bs-toggle="dropdown" aria-expanded="false"><i
                                             class="fa fa-ellipsis-v"></i></a>
                                       <div class="dropdown-menu dropdown-menu-end">
                                          <a class="dropdown-item" href="edit-patient.html"><i
                                                class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                          <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                             data-bs-target="#delete_patient"><i
                                                class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-check check-tables">
                                       <input class="form-check-input" type="checkbox" value="something">
                                    </div>
                                 </td>
                                 <td class="profile-image"><a href="profile.html"><img width="28" height="28"
                                                                                       src="assets/img/profiles/avatar-04.jpg"
                                                                                       class="rounded-circle m-r-5"
                                                                                       alt=""> Bernardo James</a>
                                 </td>
                                 <td>Dentist</td>
                                 <td>Prostate</td>
                                 <td>MBBS, MS</td>
                                 <td><a href="javascript:;">+1 23 456890</a></td>
                                 <td><a href="https://preclinic.dreamguystech.com/cdn-cgi/l/email-protection"
                                        class="__cf_email__" data-cfemail="b8ddc0d9d5c8d4ddf8ddd5d9d1d496dbd7d5">[email&#160;protected]</a>
                                 </td>
                                 <td>01.10.2022</td>
                                 <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                       <a href="#" class="action-icon dropdown-toggle"
                                          data-bs-toggle="dropdown" aria-expanded="false"><i
                                             class="fa fa-ellipsis-v"></i></a>
                                       <div class="dropdown-menu dropdown-menu-end">
                                          <a class="dropdown-item" href="edit-patient.html"><i
                                                class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                          <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                             data-bs-target="#delete_patient"><i
                                                class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-check check-tables">
                                       <input class="form-check-input" type="checkbox" value="something">
                                    </div>
                                 </td>
                                 <td class="profile-image"><a href="profile.html"><img width="28" height="28"
                                                                                       src="assets/img/profiles/avatar-06.jpg"
                                                                                       class="rounded-circle m-r-5"
                                                                                       alt="">Cristina Groves</a>
                                 </td>
                                 <td>Gynocolgy</td>
                                 <td>Prostate</td>
                                 <td>MBBS, MS</td>
                                 <td><a href="javascript:;">+1 23 456890</a></td>
                                 <td><a href="https://preclinic.dreamguystech.com/cdn-cgi/l/email-protection"
                                        class="__cf_email__" data-cfemail="9ffae7fef2eff3fadffaf2fef6f3b1fcf0f2">[email&#160;protected]</a>
                                 </td>
                                 <td>01.10.2022</td>
                                 <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                       <a href="#" class="action-icon dropdown-toggle"
                                          data-bs-toggle="dropdown" aria-expanded="false"><i
                                             class="fa fa-ellipsis-v"></i></a>
                                       <div class="dropdown-menu dropdown-menu-end">
                                          <a class="dropdown-item" href="edit-patient.html"><i
                                                class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                          <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                             data-bs-target="#delete_patient"><i
                                                class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-check check-tables">
                                       <input class="form-check-input" type="checkbox" value="something">
                                    </div>
                                 </td>
                                 <td class="profile-image"><a href="profile.html"><img width="28" height="28"
                                                                                       src="assets/img/profiles/avatar-05.jpg"
                                                                                       class="rounded-circle m-r-5"
                                                                                       alt=""> Mark Hay Smith</a>
                                 </td>
                                 <td>Gynocolgy</td>
                                 <td>Prostate</td>
                                 <td>MBBS, MS</td>
                                 <td><a href="javascript:;">+1 23 456890</a></td>
                                 <td><a href="https://preclinic.dreamguystech.com/cdn-cgi/l/email-protection"
                                        class="__cf_email__" data-cfemail="513429303c213d3411343c30383d7f323e3c">[email&#160;protected]</a>
                                 </td>
                                 <td>01.10.2022</td>
                                 <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                       <a href="#" class="action-icon dropdown-toggle"
                                          data-bs-toggle="dropdown" aria-expanded="false"><i
                                             class="fa fa-ellipsis-v"></i></a>
                                       <div class="dropdown-menu dropdown-menu-end">
                                          <a class="dropdown-item" href="edit-patient.html"><i
                                                class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                          <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                             data-bs-target="#delete_patient"><i
                                                class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-check check-tables">
                                       <input class="form-check-input" type="checkbox" value="something">
                                    </div>
                                 </td>
                                 <td class="profile-image"><a href="profile.html"><img width="28" height="28"
                                                                                       src="assets/img/profiles/avatar-01.jpg"
                                                                                       class="rounded-circle m-r-5"
                                                                                       alt=""> Andrea Lalema</a>
                                 </td>
                                 <td>Otolaryngology</td>
                                 <td>Infertility</td>
                                 <td>MBBS, MS</td>
                                 <td><a href="javascript:;">+1 23 456890</a></td>
                                 <td><a href="https://preclinic.dreamguystech.com/cdn-cgi/l/email-protection"
                                        class="__cf_email__" data-cfemail="56332e373b263a3316333b373f3a7835393b">[email&#160;protected]</a>
                                 </td>
                                 <td>01.10.2022</td>
                                 <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                       <a href="#" class="action-icon dropdown-toggle"
                                          data-bs-toggle="dropdown" aria-expanded="false"><i
                                             class="fa fa-ellipsis-v"></i></a>
                                       <div class="dropdown-menu dropdown-menu-end">
                                          <a class="dropdown-item" href="edit-patient.html"><i
                                                class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                          <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                             data-bs-target="#delete_patient"><i
                                                class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <div class="form-check check-tables">
                                       <input class="form-check-input" type="checkbox" value="something">
                                    </div>
                                 </td>
                                 <td class="profile-image"><a href="profile.html"><img width="28" height="28"
                                                                                       src="assets/img/profiles/avatar-02.jpg"
                                                                                       class="rounded-circle m-r-5"
                                                                                       alt="">Smith Bruklin</a>
                                 </td>
                                 <td>Urology</td>
                                 <td>Prostate</td>
                                 <td>MBBS, MS</td>
                                 <td><a href="javascript:;">+1 23 456890</a></td>
                                 <td><a href="https://preclinic.dreamguystech.com/cdn-cgi/l/email-protection"
                                        class="__cf_email__" data-cfemail="bcd9c4ddd1ccd0d9fcd9d1ddd5d092dfd3d1">[email&#160;protected]</a>
                                 </td>
                                 <td>01.10.2022</td>
                                 <td class="text-end">
                                    <div class="dropdown dropdown-action">
                                       <a href="#" class="action-icon dropdown-toggle"
                                          data-bs-toggle="dropdown" aria-expanded="false"><i
                                             class="fa fa-ellipsis-v"></i></a>
                                       <div class="dropdown-menu dropdown-menu-end">
                                          <a class="dropdown-item" href="edit-patient.html"><i
                                                class="fa-solid fa-pen-to-square m-r-5"></i> Edit</a>
                                          <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                             data-bs-target="#delete_patient"><i
                                                class="fa fa-trash-alt m-r-5"></i> Delete</a>
                                       </div>
                                    </div>
                                 </td>
                              </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="tab-pane" id="bottom-tab2">
            Tab content 2
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