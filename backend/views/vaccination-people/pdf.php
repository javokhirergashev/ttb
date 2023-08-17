<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\VaccinationPeople $model */
/** @var common\models\People $model */
/** @var $qvp */


$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Vaccination Peoples', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="container">
    <div class="row">
        <div class="col-3">
            <p>O'zbekiston Respublikasi</p>
            <p>Sog'liqni saqlash Vazirligi</p>
            <p><?= $qvp->title?></p>
        </div>
        <div class="col-6"></div>
        <div class="col-3"></div>
    </div>

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
