<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var  $models */
/** @var  $person */



?>

<div class="container-fluid">
    <div class="row col-12 " >
            <p>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; O'zbekiston Respublikasi &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; O'zbekiston Respublikasi</p>
            <p>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Sog'liqni saqlash Vazirligi&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;   Sog'liqni saqlash Vazirining</p>
            <p>&nbsp;&nbsp;Namangan Shahar Tibbiyot Birlashmasi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  17.01.2022.yildagi 16-buyruq</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $qvp->title?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;bilan tasdiqlangan 063 raqamli</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; tibbiy xujjat shakli</p>
    </div>
    </div>
    <div class="row">
        <p style="font-weight: bold;font-size: 20px" class="text-center ">Imtiyozli yo’llanma №<?= $person->id ?></p>
        <p class="text-center" style="font-size:17px;font-weight:500">O'zbekiston Respublikasi Sog'liqni Saqlash Vazirligi Namangan Shahar Tibbiyot Birlashmasi <br>Tibbiyot muassasasi nomi:  <?=$qvp->title?>&nbsp;<span style="text-decoration: underline;font-weight: bold">F №063</span></p>
        <p><span style="font-weight: bold">Shaxsiy indentifikatsion tartib raqami:&nbsp;</span><?=$person->qvp->title?></p>
        <p><span style="font-weight: bold">Ro'yxatga olindi:</span></p>
        <p><span style="font-weight: bold">Ismi,&nbsp;sharifi: </span><?=$person->first_name?>&nbsp; <?=$person->last_name?> &nbsp;<?=$person->middle_name?> </p>
        <p>
            <span style="font-weight: bold">Tug'ilgan sana:&nbsp;yil:</span>
            <?=Yii::$app->formatter->asDatetime($person->birthday,'php:Y')?>
            <span style="font-weight: bold">oy:&nbsp;</span>
            <?=Yii::$app->formatter->asDatetime($person->birthday,'php:M')?>
            <span style="font-weight: bold">kun:&nbsp;</span>
            <?=Yii::$app->formatter->asDatetime($person->birthday,'php:d')?>
        </p>
        <p>
            <span style="font-weight: bold">Yashash manzilgohi, tibbiyot muassasasi nomi,aholi punkti:</span>
            <?=$qvp->title?>
            <span style="font-weight: bold">Ko'cha:</span>
            <?=$person->address?>
        </p>
        <table class="table table-bordered">
                <tr>
                    <td style="padding:8px 12px; width: 40%">1.Familiyasi, ismi, sharifi :</td>
                    <td style="padding:8px 12px">
                </tr>
                <tr>
                    <td style="padding:10px;">2.Jismoniy shaxsning shaxsiy identifikatsion raqami</td>
                    <td style="padding:10px">
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;">3. Tug’ilgan sanasi:</td>
                    <td style="padding:10px">
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;">4.Doimiy yashash manzili:</td>
                    <td style="padding:10px">
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;">5.Joylashish sanasi:</td>
                    <td style="padding:10px">
                    </td>
                </tr>
                <tr>
                    <td style="padding:10px;">6. Holati :</td>
                    <td style="padding:10px">
                    </td>
                </tr>
            </table>
    </div>
</div>
