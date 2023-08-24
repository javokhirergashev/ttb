<?php


use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\VaccinationPeople $model */
/** @var $dataProvider \yii\data\ActiveDataProvider */


?>

<div class="container-fluid">
    <div class="row col-12 " >
            <p>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; O'zbekiston Respublikasi &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;  &nbsp; O'zbekiston Respublikasi</p>
            <p>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  Sog'liqni saqlash Vazirligi&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;   Sog'liqni saqlash Vazirining</p>
            <p>&nbsp;&nbsp;Namangan Shahar Tibbiyot Birlashmasi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  17.01.2022.yildagi 16-buyruq</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $model->person->qvp->title?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;bilan tasdiqlangan 063 raqamli</p>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; tibbiy xujjat shakli</p>
    </div>
    </div>
    <div class="row">
        <p style="font-weight: bold;font-size: 20px" class="text-center ">Imtiyozli yo’llanma №<?= $model->id ?></p>
        <p class="text-center" style="font-size:17px;font-weight:500">O'zbekiston Respublikasi Sog'liqni Saqlash Vazirligi Namangan Shahar Tibbiyot Birlashmasi <br>Tibbiyot muassasasi nomi:  <?=$model->person->qvp->title?>&nbsp;<span style="text-decoration: underline;font-weight: bold">F №063</span></p>
        <p><span style="font-weight: bold">Shaxsiy indentifikatsion tartib raqami:&nbsp;</span><?=$model->id?></p>
        <p>
            <span style="font-weight: bold">Ro'yxatga olindi:</span>
            <?=date('d.m.Y')?>
        </p>
        <p><span style="font-weight: bold">Ismi,&nbsp;sharifi: </span><?=$model->person->first_name?>&nbsp; <?=$model->person->last_name?> &nbsp;<?=$model->person->middle_name?> </p>
        <p>
            <span style="font-weight: bold">Tug'ilgan sana:&nbsp;yil:</span>
            <?=date('Y',$model->person->birthday)?>
            <span style="font-weight: bold">oy:&nbsp;</span>
            <?=date('m',$model->person->birthday)?>
            <span style="font-weight: bold">kun:&nbsp;</span>
            <?=date('d',$model->person->birthday)?>
        </p>
        <p>
            <span style="font-weight: bold">Yashash manzilgohi, tibbiyot muassasasi nomi,aholi punkti:</span>
            <?=$model->person->qvp->title?>
            <span style="font-weight: bold">Ko'cha:</span>
            <?=$model->person->qvp->address?>
        </p>
        <p>
            <span style="font-weight: bold">Manzilgohni o'zgarganini  belgilash:</span>
        </p>
        <p>
            <span style="font-weight: bold">Kartani to'ldirilgan vaqti</span>
            <?=date('d.m.Y')?>
        </p>
    </div>
    <div class="row">
        <p class="text-center"><?=$model->vacclass->name?></p>
        <table class="table table-bordered">

            <tr>
                <td class="text-center" style="width: 10%">Emlash turi</td>
                <td class="text-center" >Yoshi</td>
                <td class="text-center" >Muddati</td>
                <td class="text-center" >Miqdori</td>
                <td class="text-center" >Preparatning nomi,ishlab chiqaruvchi</td>
                <td class="text-center" >Emlashga reaksiyalar <br>maxalliy, <br>umumiy</td>
                <td class="text-center" >Shu <br>jumladan <br>maxalliy</td>
                <td class="text-center" >Shu <br>jumladan <br>umumiy</td>
                <td class="text-center" >Tibbiyot <br>qarshiligi <br> (muddat,sababi)</td>


            </tr>
            <tr>
                <td class="text-center" ></td>
                <td class="text-center" ></td>
                <td class="text-center" ></td>
                <td class="text-center" ></td>
                <td class="text-center" ></td>
                <td class="text-center" ></td>
                <td class="text-center" ></td>
                <td class="text-center" ></td>
                <td class="text-center" ></td>
            </tr>
            <tr>
                <td style="padding:10px;">Muddati</td>
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
