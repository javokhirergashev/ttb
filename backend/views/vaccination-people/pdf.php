<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\VaccinationPeople $model */
/** @var common\models\People $model */
/** @var $qvp */

?>

<div class="container">
    <div class="row col-12 d-flex text-center">
        <div class="col-6" style="width:50%;">
            <p>O'zbekiston Respublikasi</p>
            <p>Sog'liqni saqlash Vazirligi</p>
            <p><?= $qvp->title?></p>
        </div>
        <div class="col-6 " style="width:50%;">
            <p>O'zbekiston Respublikasi</p>
            <p>Sog'liqni saqlash Vazirining</p>
            <p>17.01.2022.yildagi 16-buyruq</p>
            <p>bilan tasdiqlangan 063 raqamli</p>
            <p>tibbiy xujjat shakli</p>
        </div>
    </div>
    <div class="row">
        <h3 class="text-center" style="margin-bottom: 35px">Imtiyozli yo’llanma №<?= $model->id ?>

            <table class="table table-bordered" width="100%">
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
