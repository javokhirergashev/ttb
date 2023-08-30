<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var  $models */
/** @var  $person */
$classes = \common\models\VaccinationClass::find()->all();

?>

<div class="container-fluid">
    <div class="row col-12 ">
        <p>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; O'zbekiston Respublikasi &nbsp;&nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; O'zbekiston Respublikasi</p>
        <p>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sog'liqni saqlash Vazirligi&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; Sog'liqni saqlash Vazirining</p>
        <p>&nbsp;&nbsp;Namangan Shahar Tibbiyot Birlashmasi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 17.01.2022.yildagi 16-buyruq</p>
        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $person->qvp->title ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;bilan
            tasdiqlangan 063 raqamli</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; tibbiy xujjat shakli</p>
    </div>
</div>
<div class="row">

    <p style="font-weight: bold;font-size: 20px" class="text-center ">Imtiyozli yo’llanma №<?= $person->id ?></p>
    <p class="text-center" style="font-size:17px;font-weight:500">O'zbekiston Respublikasi Sog'liqni Saqlash Vazirligi
        Namangan Shahar Tibbiyot Birlashmasi <br>Tibbiyot muassasasi nomi: <?= $qvp->title ?>&nbsp;<span
                style="text-decoration: underline;font-weight: bold">F №063</span></p>
    <p><span style="font-weight: bold">Shaxsiy indentifikatsion tartib raqami:&nbsp;</span><?= $person->qvp->title ?>
    </p>
    <p><span style="font-weight: bold">Ro'yxatga olindi:&nbsp;</span><?= date('d.m.Y') ?></p>
    <p><span style="font-weight: bold">Ismi,&nbsp;sharifi: </span><?= $person->first_name ?>
        &nbsp; <?= $person->last_name ?> &nbsp;<?= $person->middle_name ?> </p>
    <p>
        <span style="font-weight: bold">Yashash manzilgohi, tibbiyot muassasasi nomi,aholi punkti:</span>
        <?= $models->person->qvp->title ?>
        <span style="font-weight: bold">Ko'cha:</span>
        <?= $person->address ?>
    </p>
    <p>
        <span style="font-weight: bold">Tug'ilgan sana:&nbsp;yil:</span>
        <?= Yii::$app->formatter->asDatetime($person->birthday, 'php:d.m.Y') ?>
    </p>
    <p>
        <span style="font-weight: bold">Manzilgohni o'zgarganini  belgilash:</span>
    </p>
    <p>
        <span style="font-weight: bold">Kartani to'ldirilgan vaqti:</span>
        <?= date('d.m.Y') ?>
    </p>
</div>
<div class="row">
    <?php foreach ($classes as $index => $class): ?>
        <?php if ($class->id == 1) : ?>
            <p class="text-center"><?= $class->name ?></p>

                    <table class="table table-bordered">
                        <tr>
                            <td class="text-center" style="width: 10%">Emlash turi</td>
                            <td class="text-center">Yoshi</td>
                            <td class="text-center">Muddati</td>
                            <td class="text-center">Miqdori</td>
                            <td class="text-center">Preparatning nomi,ishlab chiqaruvchi</td>
                            <td class="text-center">Emlashga reaksiyalar <br>maxalliy, <br>umumiy</td>
                            <td class="text-center">Shu <br>jumladan <br>maxalliy</td>
                            <td class="text-center">Shu <br>jumladan <br>umumiy</td>
                            <td class="text-center">Tibbiyot <br>qarshiligi <br> (muddat,sababi)</td>
                        </tr>
                        <tr>

                        </tr>

                        <?php foreach ($models as $model): ?>
                            <?php if ($model->vaccination_class_id == 1 ): ?>
                                    <tr>
                                        <td class="text-center"><?= $model->vaccination->name ?></td>
                                        <td class="text-center"><?= $model->person->birthday ?></td>
                                        <td class="text-center"><?= $model->period ?></td>
                                        <td class="text-center"><?= $model->amount ?></td>
                                        <td class="text-center"><?= $model->vaccination->name ?></td>
                                        <td class="text-center"><?= $model->reaction ?></td>
                                        <td class="text-center"><?= $model->reaction_local ?></td>
                                        <td class="text-center"><?= $model->reaction_common ?></td>
                                        <td class="text-center"><?= $model->medical_repulse ?></td>
                                    </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </table>

        <?php elseif ($class->id == 2) : ?>
            <p class="text-center"><?= $class->name ?></p>
        <?php elseif ($class->id == 3) : ?>
            <p class="text-center"><?= $class->name ?></p>
        <?php elseif ($class->id == 4) : ?>
            <p class="text-center"><?= $class->name ?></p>
        <?php elseif ($class->id == 5) : ?>
            <p class="text-center"><?= $class->name ?></p>
        <?php elseif ($class->id == 6) : ?>
            <p class="text-center"><?= $class->name ?></p>
        <?php elseif ($class->id == 7) : ?>
            <p class="text-center"><?= $class->name ?></p>
        <?php elseif ($class->id == 8) : ?>
            <p class="text-center"><?= $class->name ?></p>
        <?php elseif ($class->id == 9) : ?>
            <p class="text-center"><?= $class->name ?></p>
        <?php elseif ($class->id == 10) : ?>
            <p class="text-center"><?= $class->name ?></p>
        <?php elseif ($class->id == 11) : ?>
            <p class="text-center"><?= $class->name ?></p>
        <?php elseif ($class->id == 12) : ?>
            <p class="text-center"><?= $class->name ?></p>
        <?php elseif ($class->id == 13) : ?>
            <p class="text-center"><?= $class->name ?></p>
        <?php elseif ($class->id == 14) : ?>
            <p class="text-center"><?= $class->name ?></p>
        <?php endif;?>


    <?php endforeach; ?>

</div>
</div>
