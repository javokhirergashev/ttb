<?php

/**
 * @var $model \common\models\Referral
 */

use Da\QrCode\QrCode;
use yii\helpers\Url;

$qrCode = (new QrCode(Yii::$app->request->getHostInfo()."/referral/data?id=".$model->id))->setSize(150);
?>

<div class="container">
    <table class="table table-bordered">
        <tr>
            <td style="padding:15px;" class="text-center"><img src="./backend-files/flag.jpg" alt=""></td>
            <td style="padding:20px 15px;" class="text-center"> O'ZBEKISTON RESPUBLIKASI SOG'LIQNI SAQLASH VAZIRLIGI
            </td>
        </tr>
    </table>

    <h3 class="text-center" style="margin-bottom: 35px">Imtiyozli yo’llanma №<?= $model->id ?>
        (<?= date('d.m.Y', $model->created_at) ?>)</h3>
    <table class="table table-bordered" width="100%">
        <tr>
            <td style="padding:8px 12px; width: 40%">1.Familiyasi, ismi, sharifi :</td>
            <td style="padding:8px 12px"><?= $model->people->getFullName() ?></td>
        </tr>
        <tr>
            <td style="padding:10px;">2.Jismoniy shaxsning shaxsiy identifikatsion raqami</td>
            <td style="padding:10px"> <?= $model->people_id ?>
            </td>
        </tr>
        <tr>
            <td style="padding:10px;">3. Tug’ilgan sanasi:</td>
            <td style="padding:10px"> <?= $model->people->birthday ?>
            </td>
        </tr>
        <tr>
            <td style="padding:10px;">4.Doimiy yashash manzili:</td>
            <td style="padding:10px"> <?= $model->people->getAddress() ?>
            </td>
        </tr>
    </table>
</div>
