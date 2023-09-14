<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var $person \common\models\People */
$classes = \common\models\VaccinationClass::find()->orderBy(['id' => SORT_ASC])->all();

?>

<div class="container-fluid">
    <div class="row col-12 ">
        <p>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; O'zbekiston Respublikasi &nbsp;&nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; O'zbekiston Respublikasi</p>
        <p>&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sog'liqni Saqlash Vazirligi&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; Sog'liqni Saqlash Vazirining</p>
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
        Namangan Shahar Tibbiyot Birlashmasi <br>Tibbiyot muassasasi nomi: <?= $person->qvp->title ?>&nbsp;<span
                style="text-decoration: underline;font-weight: bold">F №063</span></p>
    <p><span style="font-weight: bold">Shaxsiy indentifikatsion tartib raqami:&nbsp;</span><?= $person->qvp->title ?>
    </p>
    <p><span style="font-weight: bold">Ro'yxatga olindi:&nbsp;</span><?= date('d.m.Y') ?></p>
    <p><span style="font-weight: bold">Ismi,&nbsp;sharifi: </span><?= $person->first_name ?>
        &nbsp; <?= $person->last_name ?> &nbsp;<?= $person->middle_name ?> </p>
    <p>
        <span style="font-weight: bold">Yashash manzilgohi, tibbiyot muassasasi nomi,aholi punkti:</span>
        <?= $person->qvp->title ?>
        <span style="font-weight: bold">Ko'cha:</span>
        <?= $person->address ?>
    </p>
    <p>
        <span style="font-weight: bold">Tug'ilgan sana:&nbsp;</span>
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
    <br>
    <?php foreach ($classes as $index => $class): ?>
        <?php if ($class->id == 1) : ?>
            <p  class="text-center" style="font-weight:bold">1.<?= $class->name ?>:</p>
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
                <br>
                <?php
                /**
                 * @var $models \common\models\Vaccination[]
                 * @var $vaccinationPeople \common\models\VaccinationPeople
                 */
                $models = \common\models\Vaccination::find()->andWhere(['vaccination_class_id' => $class->id])
                    ->orderBy(['id' => SORT_ASC])->all();
                ?>

                <?php foreach ($models as $model): ?>
                    <?php $vaccinationPeople = \common\models\VaccinationPeople::find()->andWhere(['vaccination_id' => $model->id, 'people_id' => $person->id])->one(); ?>
                    <tr>
                        <td class="text-center"><?= $model->name ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? (intval(date('Y')) - intval(date('Y', $vaccinationPeople->person->birthday))) : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->period : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->amount : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->seria : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->reaction : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->reaction_local : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->reaction_common : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->medical_repulse : "" ?></td>
                    </tr>

                <?php endforeach; ?>
            </table>
            <br>
        <?php elseif ($class->id == 2) : ?>

            <p style="font-weight:bold" class="text-center">2.<?= $class->name ?>:</p>
            <table class="table table-bordered">
                <tr>
                    <td class="text-center" style="width: 11%">Tuberkulin sinamalari,oy,kun,yil</td>
                    <td class="text-center" style="width: 8%">Natijasi</td>
                    <td class="text-center" style="width: 10%">Seriya</td>
                    <td class="text-center" style="width: 8%">Emlash turi</td>
                    <td class="text-center">Yoshi</td>
                    <td class="text-center">Muddati</td>
                    <td class="text-center" style="width: 8.5%">Miqdori <br> (doza)</td>
                    <td class="text-center" style="width: 8%">Seriya</td>
                    <td class="text-center">Emlashga reaksiyalar <br>maxalliy, <br>umumiy</td>
                    <td class="text-center">Tibbiyot <br>qarshiligi <br> (muddat,sababi)</td>
                </tr>

                <?php
                /**
                 * @var $models \common\models\Vaccination[]
                 * @var $vaccinationPeople \common\models\VaccinationPeople
                 */
                $models = \common\models\Vaccination::find()->andWhere(['vaccination_class_id' => $class->id])
                    ->orderBy(['id' => SORT_ASC])->all(); ?>

                <?php foreach ($models as $model): ?>
                    <?php $vaccinationPeople = \common\models\VaccinationPeople::find()->andWhere(['vaccination_id' => $model->id, 'people_id' => $person->id])->one(); ?>
                    <tr>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->created_at : ""?></td>
                        <td class="text-center"></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->seria : ""?></td>
                        <td class="text-center"><?= $model->name ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? intval(date('Y')) - intval(date('Y', $vaccinationPeople->person->birthday)) : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->period : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->amount : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->seria : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->reaction : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->medical_repulse : "" ?></td>
<!--                        <td class="text-center">--><?php //= $vaccinationPeople ? $vaccinationPeople->medical_repulse : "" ?><!--</td>-->
                    </tr>

                <?php endforeach; ?>
            </table>
            <br>
            <br>
            <br>
            <br>
        <?php elseif ($class->id == 3) : ?>
            <p style="font-weight:bold" class="text-center" >3.<?= $class->name ?>:</p>
            <table style="margin-top:100px!important;" class="table table-bordered" >
        <tr>
            <td class="text-center" style="width: 11%">Tuberkulin sinamalari,oy,kun,yil</td>
            <td class="text-center" style="width: 8%">Natijasi</td>
            <td class="text-center" style="width: 10%">Seriya</td>
            <td class="text-center" style="width: 8%">Emlash turi</td>
            <td class="text-center">Yoshi</td>
            <td class="text-center">Muddati</td>
            <td class="text-center" style="width: 8.5%">Miqdori <br> (doza)</td>
            <td class="text-center" style="width: 8%">Seriya</td>
            <td class="text-center">Emlashga reaksiyalar <br>maxalliy, <br>umumiy</td>
            <td class="text-center">Tibbiyot <br>qarshiligi <br> (muddat,sababi)</td>
        </tr>

        <?php
        /**
         * @var $models \common\models\Vaccination[]
         * @var $vaccinationPeople \common\models\VaccinationPeople
         */
        $models = \common\models\Vaccination::find()->andWhere(['vaccination_class_id' => $class->id])
            ->orderBy(['id' => SORT_ASC])->all(); ?>

        <?php foreach ($models as $model): ?>
            <?php $vaccinationPeople = \common\models\VaccinationPeople::find()->andWhere(['vaccination_id' => $model->id, 'people_id' => $person->id])->one(); ?>
            <tr>
                <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->created_at : ""?></td>
                <td class="text-center"></td>
                <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->seria : ""?></td>
                <td class="text-center"><?= $model->name ?></td>
                <td class="text-center"><?= $vaccinationPeople ? intval(date('Y')) - intval(date('Y', $vaccinationPeople->person->birthday)) : "" ?></td>
                <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->period : "" ?></td>
                <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->amount : "" ?></td>
                <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->seria : "" ?></td>
                <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->reaction : "" ?></td>
                <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->medical_repulse : "" ?></td>
                <!--                        <td class="text-center">--><?php //= $vaccinationPeople ? $vaccinationPeople->medical_repulse : "" ?><!--</td>-->
            </tr>

        <?php endforeach; ?>
    </table>
        <?php elseif ($class->id == 4) : ?>
            <p style="font-weight:bold" class="text-center">4.<?= $class->name ?>:</p>
            <table class="table table-bordered">
                <tr>
                    <td class="text-center" style="width: 11%">Emlash turi</td>
                    <td class="text-center" style="width: 8%">Yoshi</td>
                    <td class="text-center" style="width: 10%">Muddati</td>
                    <td class="text-center" style="width: 9%">Miqdori <br>(doza)</td>
                    <td class="text-center">Seriya</td>
                    <td class="text-center">Emlashga reaksiyalar umumiy</td>
                    <td class="text-center">Tibbiyot <br>qarshiligi <br> (muddat,sababi)</td>
                </tr>

                <?php
                /**
                 * @var $models \common\models\Vaccination[]
                 * @var $vaccinationPeople \common\models\VaccinationPeople
                 */
                $models = \common\models\Vaccination::find()->andWhere(['vaccination_class_id' => $class->id])
                    ->orderBy(['id' => SORT_ASC])->all(); ?>

                <?php foreach ($models as $model): ?>
                    <?php $vaccinationPeople = \common\models\VaccinationPeople::find()->andWhere(['vaccination_id' => $model->id, 'people_id' => $person->id])->one(); ?>
                    <tr>
                        <td class="text-center"><?= $model->name ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? intval(date('Y')) - intval(date('Y', $vaccinationPeople->person->birthday)) : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->period : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->amount : "" ?></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->seria : ""?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->reaction : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->medical_repulse : "" ?></td>

                    </tr>

                <?php endforeach; ?>
            </table>
        <?php elseif ($class->id == 5) : ?>
            <p style="font-weight:bold" class="text-center">5.<?= $class->name ?>:</p>
            <table class="table table-bordered">
                <tr>
                    <td class="text-center" style="width: 20%">Emlash turi</td>
                    <td class="text-center" style="width: 8%">Yoshi</td>
                    <td class="text-center" style="width: 10%">Muddati</td>
                    <td class="text-center" style="width: 9%">Miqdori <br>(doza)</td>
                    <td class="text-center">Seriya</td>
                    <td class="text-center">Emlashga reaksiyalar umumiy</td>
                    <td class="text-center">Tibbiyot <br>qarshiligi <br> (muddat,sababi)</td>
                </tr>

                <?php
                /**
                 * @var $models \common\models\Vaccination[]
                 * @var $vaccinationPeople \common\models\VaccinationPeople
                 */
                $models = \common\models\Vaccination::find()->andWhere(['vaccination_class_id' => $class->id])
                    ->orderBy(['id' => SORT_ASC])->all(); ?>

                <?php foreach ($models as $model): ?>
                    <?php $vaccinationPeople = \common\models\VaccinationPeople::find()->andWhere(['vaccination_id' => $model->id, 'people_id' => $person->id])->one(); ?>
                    <tr>
                        <td class="text-center"><?= $model->name ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? intval(date('Y')) - intval(date('Y', $vaccinationPeople->person->birthday)) : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->period : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->amount : "" ?></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->seria : ""?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->reaction : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->medical_repulse : "" ?></td>

                    </tr>

                <?php endforeach; ?>
            </table>
        <?php elseif ($class->id == 6) : ?>
            <p style="font-weight:bold" class="text-center">6.<?= $class->name ?>:</p>
            <table class="table table-bordered">
                <tr>
                    <td class="text-center" style="width: 18%">Emlash turi</td>
                    <td class="text-center" style="width: 8%">Yoshi</td>
                    <td class="text-center" style="width: 10%">Muddati</td>
                    <td class="text-center" style="width: 9%">Miqdori <br>(doza)</td>
                    <td class="text-center" style="width:7%">Seriya</td>
                    <td class="text-center" style="width:11%">Preparatning nomi,ishlab chiqaruvchi</td>
                    <td class="text-center" style="width:10%">Emlashga reaksiyalar maxalliy,umumiy</td>
                    <td class="text-center" style="width:9%">Shu jumladan maxalliy</td>
                    <td class="text-center" style="width:9%">Shu jumladan umumiy</td>
                    <td class="text-center">Tibbiyot <br>qarshiligi <br> (muddat,sababi)</td>
                </tr>

                <?php
                /**
                 * @var $models \common\models\Vaccination[]
                 * @var $vaccinationPeople \common\models\VaccinationPeople
                 */
                $models = \common\models\Vaccination::find()->andWhere(['vaccination_class_id' => $class->id])
                    ->orderBy(['id' => SORT_ASC])->all(); ?>

                <?php foreach ($models as $model): ?>
                    <?php $vaccinationPeople = \common\models\VaccinationPeople::find()->andWhere(['vaccination_id' => $model->id, 'people_id' => $person->id])->one(); ?>
                    <tr>
                        <td class="text-center"><?= $model->name ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? intval(date('Y')) - intval(date('Y', $vaccinationPeople->person->birthday)) : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->period : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->amount : "" ?></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->seria : ""?></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->preparat_name: ""?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->reaction : "" ?></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->reaction_local : ""?></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->reaction_common : ""?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->medical_repulse : "" ?></td>

                    </tr>

                <?php endforeach; ?>
            </table>
            <div>
                <span style="font-weight:bold">Preparatni harflar bilan belgilash:</span>
                <p>
                    <span>AKDS-adsorbirlangan difteriya-ko'kyo'tal-stolbnyak vaktsinasi;</span> <br>
                    <span>ADS- adsorbirlangan difteriya-stolbnyak vaktsinasi;</span> <br>
                    <span>ADS- adsorbirlangan difteriya-ko'kyo'tal-stolbnyak vaktsinasi(difteriya anatoksinini kam saqlaydi);</span><br>
                    <span>SA- stolbnyak anotoksini (PRS-stolbnyakka qarshi zardob);</span> <br>
                    <span>XIB- infeksiya-gemofil tayoqchalari chaqiradigan kasalliklarga:(bakterial meningit,zotiljam,sepsis)qarshi emlash;</span><br>
                </p>
            </div>
            <br>
            <br>
            <br>
        <?php elseif ($class->id == 7) : ?>
            <p style="font-weight:bold" class="text-center">7.<?= $class->name ?>:</p>
            <table class="table table-bordered">
                <tr>
                    <td class="text-center" style="width: 18%">Emlash turi</td>
                    <td class="text-center" style="width: 8%">Yoshi</td>
                    <td class="text-center" style="width: 10%">Muddati</td>
                    <td class="text-center" style="width: 9%">Miqdori <br>(doza)</td>
                    <td class="text-center" style="width:7%">Seriya</td>
                    <td class="text-center" style="width:11%">Preparatning nomi,ishlab chiqaruvchi</td>
                    <td class="text-center" style="width:10%">Emlashga reaksiyalar maxalliy,umumiy</td>
                    <td class="text-center" style="width:9%">Shu jumladan maxalliy</td>
                    <td class="text-center" style="width:9%">Shu jumladan umumiy</td>
                    <td class="text-center">Tibbiyot <br>qarshiligi <br> (muddat,sababi)</td>
                </tr>

                <?php
                /**
                 * @var $models \common\models\Vaccination[]
                 * @var $vaccinationPeople \common\models\VaccinationPeople
                 */
                $models = \common\models\Vaccination::find()->andWhere(['vaccination_class_id' => $class->id])
                    ->orderBy(['id' => SORT_ASC])->all(); ?>

                <?php foreach ($models as $model): ?>
                    <?php $vaccinationPeople = \common\models\VaccinationPeople::find()->andWhere(['vaccination_id' => $model->id, 'people_id' => $person->id])->one(); ?>
                    <tr>
                        <td class="text-center"><?= $model->name ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? intval(date('Y')) - intval(date('Y', $vaccinationPeople->person->birthday)) : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->period : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->amount : "" ?></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->seria : ""?></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->preparat_name: ""?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->reaction : "" ?></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->reaction_local : ""?></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->reaction_common : ""?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->medical_repulse : "" ?></td>
                    </tr>

                <?php endforeach; ?>
            </table>
            <p class="text-center">KPK-qizamiq-epidparotit-qizilcha,KK-qizamiq-qizilchaga qarshi emlash</p>

        <?php elseif ($class->id == 8) : ?>
            <p style="font-weight:bold" class="text-center">8.<?= $class->name ?>:</p>
            <table class="table table-bordered">
                <tr>
                    <td class="text-center" style="width: 18%">Emlash turi</td>
                    <td class="text-center" style="width: 8%">Yoshi</td>
                    <td class="text-center" style="width: 10%">Muddati</td>
                    <td class="text-center" style="width: 9%">Miqdori <br>(doza)</td>
                    <td class="text-center" style="width:7%">Seriya</td>
                    <td class="text-center" style="width:11%">Preparatning nomi,ishlab chiqaruvchi</td>
                    <td class="text-center" style="width:10%">Emlashga reaksiyalar maxalliy,umumiy</td>
                    <td class="text-center" style="width:9%">Shu jumladan maxalliy</td>
                    <td class="text-center" style="width:9%">Shu jumladan umumiy</td>
                    <td class="text-center">Tibbiyot <br>qarshiligi <br> (muddat,sababi)</td>
                </tr>

                <?php
                /**
                 * @var $models \common\models\Vaccination[]
                 * @var $vaccinationPeople \common\models\VaccinationPeople
                 */
                $models = \common\models\Vaccination::find()->andWhere(['vaccination_class_id' => $class->id])
                    ->orderBy(['id' => SORT_ASC])->all(); ?>

                <?php foreach ($models as $model): ?>
                    <?php $vaccinationPeople = \common\models\VaccinationPeople::find()->andWhere(['vaccination_id' => $model->id, 'people_id' => $person->id])->one(); ?>
                    <tr>
                        <td class="text-center"><?= $model->name ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? intval(date('Y')) - intval(date('Y', $vaccinationPeople->person->birthday)) : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->period : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->amount : "" ?></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->seria : ""?></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->preparat_name: ""?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->reaction : "" ?></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->reaction_local : ""?></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->reaction_common : ""?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->medical_repulse : "" ?></td>
                    </tr>

                <?php endforeach; ?>
            </table>
        <?php elseif ($class->id == 9) : ?>
            <p style="font-weight:bold" class="text-center">9.<?= $class->name ?>:</p>
            <table class="table table-bordered">
                <tr>
                    <td class="text-center" style="width: 18%">Emlash turi</td>
                    <td class="text-center" style="width: 8%">Yoshi</td>
                    <td class="text-center" style="width: 10%">Muddati</td>
                    <td class="text-center" style="width: 9%">Miqdori <br>(doza)</td>
                    <td class="text-center" style="width:7%">Seriya</td>
                    <td class="text-center" style="width:11%">Ishlab chiqaruvchi</td>
                    <td class="text-center" style="width:11%">Emlashga reaksiyalar</td>
                    <td class="text-center">Tibbiyot <br>qarshiligi <br> (muddat,sababi)</td>
                </tr>

                <?php
                /**
                 * @var $models \common\models\Vaccination[]
                 * @var $vaccinationPeople \common\models\VaccinationPeople
                 */
                $models = \common\models\Vaccination::find()->andWhere(['vaccination_class_id' => $class->id])
                    ->orderBy(['id' => SORT_ASC])->all(); ?>

                <?php foreach ($models as $model): ?>
                    <?php $vaccinationPeople = \common\models\VaccinationPeople::find()->andWhere(['vaccination_id' => $model->id, 'people_id' => $person->id])->one(); ?>
                    <tr>
                        <td class="text-center"><?= $model->name ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? intval(date('Y')) - intval(date('Y', $vaccinationPeople->person->birthday)) : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->period : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->amount : "" ?></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->seria : ""?></td>
                        <td class="text-center"><?=$vaccinationPeople ? $vaccinationPeople->preparat_name: ""?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->reaction : "" ?></td>
                        <td class="text-center"><?= $vaccinationPeople ? $vaccinationPeople->medical_repulse : "" ?></td>
                    </tr>

                <?php endforeach; ?>
            </table>
        <?php elseif ($class->id == 10) : ?>
            <p style="font-weight:bold" class="text-center">10.<?= $class->name ?>:</p>
            <table class="table table-bordered">
                <tr>
                    <td class="text-center" style="width: 15%">Emlash turi</td>
                    <td class="text-center" style="width: 8%">Yoshi</td>
                    <td class="text-center" style="width: 10%">Muddati</td>
                    <td class="text-center" style="width: 9%">Miqdori <br>(doza)</td>
                    <td class="text-center" style="width:7%">Seriya</td>
                    <td class="text-center" style="width:11%">Ishlab chiqaruvchi</td>
                    <td class="text-center" style="width:11%">Emlashga reaksiyalar</td>
                    <td class="text-center">Tibbiyot <br>qarshiligi <br> (muddat,sababi)</td>
                </tr>
                <tr>
                    <td class="text-center" style="width: 15%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center"></td>
                </tr>
                <tr>
                    <td class="text-center" style="width: 15%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center"></td>
                </tr>



            </table>
        <?php elseif ($class->id == 11) : ?>
            <p style="font-weight:bold" class="text-center">11.<?= $class->name ?>:</p>
            <table class="table table-bordered">
                <tr>
                    <td class="text-center" style="width: 15%">Emlash turi</td>
                    <td class="text-center" style="width: 8%">Yoshi</td>
                    <td class="text-center" style="width: 10%">Muddati</td>
                    <td class="text-center" style="width: 9%">Miqdori <br>(doza)</td>
                    <td class="text-center" style="width:7%">Seriya</td>
                    <td class="text-center" style="width:11%">Ishlab chiqaruvchi</td>
                    <td class="text-center" style="width:11%">Emlashga reaksiyalar</td>
                    <td class="text-center">Tibbiyot <br>qarshiligi <br> (muddat,sababi)</td>
                </tr>
                <tr>
                    <td class="text-center" style="width: 15%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center"></td>
                </tr>
                <tr>
                    <td class="text-center" style="width: 15%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center"></td>
                </tr>
                <tr>
                    <td class="text-center" style="width: 15%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center"></td>
                </tr>
                <tr>
                    <td class="text-center" style="width: 15%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center"></td>
                </tr>

            </table>
        <?php elseif ($class->id == 12) : ?>
            <p style="font-weight:bold" class="text-center">12.<?= $class->name ?>:</p>
            <table class="table table-bordered">
                <tr>
                    <td class="text-center" style="width: 15%">Emlash turi</td>
                    <td class="text-center" style="width: 8%">Yoshi</td>
                    <td class="text-center" style="width: 10%">Muddati</td>
                    <td class="text-center" style="width: 9%">Miqdori <br>(doza)</td>
                    <td class="text-center" style="width:7%">Seriya</td>
                    <td class="text-center" style="width:11%">Ishlab chiqaruvchi</td>
                    <td class="text-center" style="width:1%">Emlashga reaksiyalar</td>
                    <td class="text-center">Tibbiyot <br>qarshiligi <br> (muddat,sababi)</td>
                </tr>
                <tr>
                    <td class="text-center" style="width: 15%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center"></td>
                </tr>
                <tr>
                    <td class="text-center" style="width: 15%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center"></td>
                </tr>
                <tr>
                    <td class="text-center" style="width: 15%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center"></td>
                </tr>
            </table>
        <?php elseif ($class->id == 13) : ?>
            <p style="font-weight:bold" class="text-center">13.<?= $class->name ?>:</p>
            <table class="table table-bordered">
                <tr>
                    <td class="text-center" style="width: 15%">Emlash turi</td>
                    <td class="text-center" style="width: 8%">Yoshi</td>
                    <td class="text-center" style="width: 10%">Muddati</td>
                    <td class="text-center" style="width: 9%">Miqdori <br>(doza)</td>
                    <td class="text-center" style="width:7%">Seriya</td>
                    <td class="text-center" style="width:11%">Ishlab chiqaruvchi</td>
                    <td class="text-center" style="width:11%">Emlashga reaksiyalar</td>
                    <td class="text-center">Tibbiyot <br>qarshiligi <br> (muddat,sababi)</td>
                </tr>
                <tr>
                    <td class="text-center" style="width: 15%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center"></td>
                </tr>
                <tr>
                    <td class="text-center" style="width: 15%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center"></td>
                </tr>
                <tr>
                    <td class="text-center" style="width: 15%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center"></td>
                </tr>
                <tr>
                    <td class="text-center" style="width: 15%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center"></td>
                </tr>


            </table>
        <?php elseif ($class->id == 14) : ?>
            <p style="font-weight:bold" class="text-center">14.<?= $class->name ?>:</p>
            <table class="table table-bordered">
                <tr>
                    <td class="text-center" style="width: 18%">Emlash turi</td>
                    <td class="text-center" style="width: 8%">Yoshi</td>
                    <td class="text-center" style="width: 10%">Muddati</td>
                    <td class="text-center" style="width: 9%">Miqdori <br>(doza)</td>
                    <td class="text-center" style="width:7%">Seriya</td>
                    <td class="text-center" style="width:11%">Preparatning nomi,ishlab chiqaruvchi</td>
                    <td class="text-center" style="width:10%">Emlashga reaksiyalar maxalliy,umumiy</td>
                    <td class="text-center" style="width:9%">Shu jumladan maxalliy</td>
                    <td class="text-center" style="width:9%">Shu jumladan umumiy</td>
                    <td class="text-center">Tibbiyot <br>qarshiligi <br> (muddat,sababi)</td>
                </tr>
                <tr>
                    <td class="text-center " style="width: 18%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:10%"></td>
                    <td class="text-center" style="width:9%"></td>
                    <td class="text-center" style="width:9%"></td>
                    <td class="text-center"></td>
                </tr>
                <tr>
                    <td class="text-center " style="width: 18%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:10%"></td>
                    <td class="text-center" style="width:9%"></td>
                    <td class="text-center" style="width:9%"></td>
                    <td class="text-center"></td>
                </tr>
                <tr>
                    <td class="text-center " style="width: 18%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:10%"></td>
                    <td class="text-center" style="width:9%"></td>
                    <td class="text-center" style="width:9%"></td>
                    <td class="text-center"></td>
                </tr>
                <tr>
                    <td class="text-center " style="width: 18%"><br><br></td>
                    <td class="text-center" style="width: 8%"></td>
                    <td class="text-center" style="width: 10%"></td>
                    <td class="text-center" style="width: 9%"></td>
                    <td class="text-center" style="width:7%"></td>
                    <td class="text-center" style="width:11%"></td>
                    <td class="text-center" style="width:10%"></td>
                    <td class="text-center" style="width:9%"></td>
                    <td class="text-center" style="width:9%"></td>
                    <td class="text-center"></td>
                </tr>
            </table>
            <p> Karta davolash- profilaftik muassasalarda bolani ro'yhatga olish vaqtida to'ldiriladi.
                Bolaning shahardan yoki tumandan ketishida F№63 xujjatining nusxasi beriladi.Kartaning asosiy
                shakli tibbiyot muassasasida qoladi va 5 yilgacha saqlanadi.
            </p>
            <p> Ro'yxatdan o'chirilgan sana: ____________________  imzo:__________________</p>


        <?php endif; ?>


    <?php endforeach; ?>

</div>
</div>
