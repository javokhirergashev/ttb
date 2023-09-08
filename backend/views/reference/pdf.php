<?php
/** @var $reference \common\models\Reference */

use Da\QrCode\QrCode;

$qrCode = (new QrCode(Yii::$app->request->getHostInfo() . "/" . $reference->id))->setSize(150);
?>

<div class="container-fluid" style="font-size: 14px; line-height: 30px;">
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
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $reference->people->qvp->title ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;bilan
            tasdiqlangan 063 raqamli</p>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; tibbiy xujjat shakli</p>
    </div>
    <div style="font-size: 14px; line-height: 64px;">
        <h3 class="text-center" style="margin-bottom: 35px">TIBBIY MA'LUMOTNOMA</h3>
        <h4 class="text-center" style="margin-bottom: 35px"><?= date('d.m.Y', $reference->created_at) ?> da
            to'ldirildi.</h4>
        <ol>
            <li>Berildi: <?= $reference->people->qvp->title ?></li>
            <li>Ma'lumotnoma taqdim etiladigan muassasa va tashkilot nomi: <?= $reference->where_to ?></li>
            <li>Familiya, ismi: <?= $reference->people_id ? $reference->people->getFullName() : " " ?></li>
            <li>Jinsi: <?php if ($reference->people->gender == \common\models\People::GENDER_MALE) {
                    echo "Erkak";
                } elseif ($reference->people->gender == \common\models\People::GENDER_FEMALE) {
                    echo "Ayol";
                }
                ?></li>
            <li>Tug'ilgan sana: <?= date('d.m.Y', $reference->people->birthday) ?></li>
            <li>Yashash joyi: <?= $reference->people->address ?></li>
            <li>Hayoti davomida o'tkazgan
                kasalliklari: <?php $diagnosises = \common\models\Diagnosis::find()->andWhere(['people_id' => $reference->people_id])->all();
                if (empty($diagnosises)) {
                    echo "Avvallari bemorda hech qanday kasallik qayd etilmagan";
                } else {
                    foreach ($diagnosises as $diagnosis) {
                        if ($diagnosis->diagnosis_list_id) {
                            echo $diagnosis->diagnosisList->name . '; ';
                        }
                    }
                }
                ?></li>
            <li>Tekshiruv paytida obektiv ma'lumotlar va salomatlik holati:<br>
                <?php
                $conclusions = \common\models\ReferenceDiagnosis::find()->andWhere(['reference_id' => $reference->id])->orderBy(['id' => SORT_ASC])->all();
                foreach ($conclusions as $conclusion) {
                    echo $conclusion->positionName . ':' . ' ' . $conclusion->diagnosis . ' ' . $conclusion->createdBy->getFullname() .  ' <img style="margin-left: 5px; width:8%;object-fit: cover" src="<?= '.$qrCode->writeDataUri() .'?>"><br>'  ;
                }
                ?>
            </li>
        </ol>
        <p style="line-height: 20px">
            Eslatma*: Odil sudlovni amalga oshirishga tusqinlik qiladigan kasalliklarning va
            jismoniy nuqsonlarning roʼyxatiga (Аdliya vazirligi tomonidan 2017 yil 23 noyabrda
            roʼyhatdan oʼtkazilgan, roʼyxat raqami 2951) muvofiq beriladi.
        </p>
    </div>
</div>