<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Request $model */

?>
<div class="container">
    <div class="row">
        <table class="table table-bordered">
            <tr>
                <td style="padding:15px;" class="text-center"><img src="./backend-files/flag.jpg" alt=""></td>
                <td style="padding:20px 15px;" class="text-center"> O'ZBEKISTON RESPUBLIKASI SOG'LIQNI SAQLASH VAZIRLIGI
                    <br> <br> NAMANGAN SHAHAR TIBBIYOT BIRLASHMASI </td>

            </tr>
        </table>
    </div>

    <div class="row">
        <h3 class="text-center" style="margin-bottom: 35px">Murojaatnoma №<?= $model->id ?></h3>

            <table class="table table-bordered">
                <tr>
                    <td class="text-center">1</td>
                    <td style="padding:8px 12px; width: 40%">Familiyasi, ismi, sharifi </td>
                    <td style="padding:8px 12px"><?=$model->first_name?>&nbsp;<?=$model->last_name?></td>
                </tr>
                <tr>
                    <td class="text-center">2</td>
                    <td style="padding:10px;">Telefon raqami</td>
                    <td style="padding:10px"><?=$model->phone_number?></td>
                </tr>
                <tr>
                    <td class="text-center">3</td>
                    <td style="padding:10px;">Murojaat kelib tushgan vaqt</td>
                    <td style="padding:10px"><?= date("Y-m-d H:i:s", $model->created_at);?></td>
                </tr>
                <tr>
                    <td class="text-center">4</td>
                    <td style="padding:10px;">Murojaat mavzusi</td>
                    <td style="padding:10px"><?=$model->title?>
                    </td>
                </tr>
                <tr>
                    <td class="text-center">5</td>
                    <td style="padding:10px;">Murojaat matni</td>
                    <td style="padding:10px"> <?=$model->comment?></td>
                </tr>

            </table>
    </div>
</div>
