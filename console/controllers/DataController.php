<?php

namespace console\controllers;

use common\fixtures\UserFixture;
use common\models\Clinic;
use common\models\DiagnosisClass;
use common\models\DiagnosisGroup;
use common\models\DiagnosisList;
use common\models\DisablityClass;
use common\models\People;
use common\models\Position;
use common\models\Qvp;
use common\models\Room;
use common\models\Section;
use common\models\Territory;
use common\models\User;
use common\models\Vaccination;
use common\models\VaccinationClass;
use common\modules\country\models\District;
use common\modules\country\models\Quarter;
use common\modules\country\models\Region;
use Faker\Factory;
use Faker\Provider\Address;
use MongoDB\BSON\RegexInterface;
use yii\console\Controller;
use yii\helpers\ArrayHelper;

class DataController extends Controller
{

    public function actionCreate()
    {
        $faker = Factory::create();

        for ($i = 0; $i < 30; $i++) {
            $region_id = Region::NAMANGAN_ID;
            $district_id = District::find()->andWhere(['region_id' => $region_id])
                ->andWhere(['in', 'id', [98, 100, 106, 102, 107, 99]])
                ->orderBy('random()')->one()->id;
            $quarter_id = Quarter::find()
                ->andWhere(['district_id' => $district_id])
                ->orderBy('random()')->one()->id;


            $qvp = new Qvp();
            $qvp->title = $faker->streetName;
            $qvp->address = $faker->address;
            $qvp->phone_number = $faker->phoneNumber;
            $qvp->status = 1;
            $qvp->type = rand(1, 2);
            $qvp->number = rand(20, 100) . "";
            $qvp->quarter_id = $quarter_id;
            $qvp->region_id = $region_id;
            $qvp->district_id = $district_id;
            $qvp->save();

        }
        var_dump("qvp created");

        for ($i = 0; $i <= 10; $i++) {
            $qvp_id = Qvp::find()->orderBy('random()')->one()->id;

            $terrytory = new Territory();
            $terrytory->name = $faker->streetName;
            $terrytory->address = $faker->address;
            $terrytory->people_count = rand(5, 100) . "";
            $terrytory->home_count = rand(5, 50) . "";
            $terrytory->qvp_id = $qvp_id;
            $terrytory->save();


        }
        var_dump("Terriytory created");

        for ($i = 0; $i <= 30; $i++) {
            $diagnosClass = new DiagnosisClass();
            $diagnosClass->name = $faker->name;
            $diagnosClass->description = $faker->text;
            $diagnosClass->status = DiagnosisClass::STATUS_ACTIVE;
            $diagnosClass->save();
        }
        var_dump("Diagnosis class created");

        for ($i = 0; $i <= 40; $i++) {
            $diagnosis_class_id = DiagnosisClass::find()->orderBy('random()')->one()->id;
            $model = new DiagnosisGroup();
            $model->diagnosis_class_id = $diagnosis_class_id;
            $model->name = $faker->name;
            $model->description = $faker->text;
            $model->status = DiagnosisGroup::STATUS_ACTIVE;
            $model->save();
        }
        var_dump("Diagnosis group created");

        for ($i = 0; $i <= 30; $i++) {
            $diagnosis_class_ids = ArrayHelper::getColumn(DiagnosisClass::find()->select('id')->asArray()->all(), 'id');
            $diagnosis_group_id = DiagnosisGroup::find()->andWhere(['diagnosis_class_id' => $diagnosis_class_ids])
                ->orderBy('random()')->one()->id;
            $model = new DiagnosisList();
            $model->diagnosis_class_id = $diagnosis_class_id;
            $model->diagnosis_group_id = $diagnosis_group_id;
            $model->name = $faker->name;
            $model->description = $faker->text;
            $model->status = DiagnosisClass::STATUS_ACTIVE;
            $model->save();
        }
        var_dump("Diagnosis List created");

        for ($i = 0; $i <= 50; $i++) {
            $region_id = Region::NAMANGAN_ID;
            $district_id = District::find()->andWhere(['region_id' => $region_id])
                ->andWhere(['in', 'id', [98, 100, 106, 102, 107, 99]])
                ->orderBy('random()')->one()->id;
            $quarter_id = Quarter::find()
                ->andWhere(['district_id' => $district_id])
                ->orderBy('random()')->one()->id;
            $qvp_id = Qvp::find()->orderBy('random()')->one()->id;

            $territory_id = Territory::find()->orderBy('random()')->one()->id;

            $people = new People();
            $people->first_name = $faker->firstName;
            $people->last_name = $faker->lastName;
            $people->middle_name = $faker->userName;
            $people->pinfl = $faker->numberBetween(10000000000000, 99999999999999) . "";
            $people->passport_number = $faker->numberBetween(548555, 999999) . "";
            $people->birthday = 714151445;
            $people->metrka_number = $faker->numberBetween(548555, 999999) . "";
            $people->gender = rand(1, 2);
            $people->territory_id = $territory_id;
            $people->region_id = $region_id;
            $people->district_id = $district_id;
            $people->quarter_id = $quarter_id;
            $people->qvp_id = $qvp_id;
            $people->dispensary_control = rand(1, 2) . "";
            $people->ayol_daftar = rand(1, 2) . "";
            $people->temir_daftar = rand(1, 2) . "";
            $people->yoshlar_daftar = rand(1, 2) . "";
            $people->job = $faker->jobTitle;
            $people->height = rand(50, 200) . "";
            $people->weight = rand(5, 150) . "";
            $people->blood_pressure = $faker->text;
            $people->pulse = rand(50, 150) . "";
            $people->head_family = rand(1, 2) . "";
            $people->disability_group = rand(0, 4) . "";
            $people->save();

        }
        var_dump("Peopel created");

        $titles = [
            ['uz' => "Doctor", "en" => "Doctor", "ru" => "Doctor"],
            ['uz' => "Hamshira", "en" => "Hamshira", "ru" => "Hamshira"],
            ['uz' => "Laborant", "en" => "Lobarant", "ru" => "Lobarant"],
        ];



        for ($i = 0; $i <= 10; $i++) {
            $position = new Position([
                'title' => $titles[rand(0, 2)],
                'status' => Position::STATUS_ACTIVE,
                'type' => rand(1, 5)
            ]);

            $position->save();
        }


        for ($i = 0; $i < 30; $i++) { // Generate 10 fake records
            $position_id = Position::find()->orderBy('random()')->one()->id;

            $user = new User();
            $user->username = $faker->userName;
            $user->first_name = $faker->firstName;
            $user->last_name = $faker->lastName;
            $user->email = $faker->email;
            $user->position_id = $position_id;
            $user->role = rand(1, 5);
            $user->address = $faker->address;
            $user->telegram_link = $faker->url;
            $user->phone_number = $faker->phoneNumber;
            $user->status = User::STATUS_ACTIVE;
            $user->password = \Yii::$app->security->generatePasswordHash($faker->password);
            $user->created_at = $faker->dateTimeThisYear;
            $user->birthday = 714151445;
            $user->generateAuthKey();
            $user->save();

        }
        var_dump("User created");

        for ($i = 0; $i < 10; $i++) {
            $region_id = Region::NAMANGAN_ID;
            $district_id = District::find()
                ->andWhere(['region_id' => $region_id])
                ->orderBy('random()')->one()->id;
            $clinic = new Clinic();
            $clinic->region_id = $region_id;
            $clinic->district_id = $district_id;
            $clinic->name = $faker->name;
            $clinic->description = $faker->text;
            $clinic->address = $faker->address;
            $clinic->phone_number = $faker->phoneNumber;
            $clinic->type = rand(1, 2);
            $clinic->save();

        }
        var_dump("clinica created");

        for ($i = 0; $i < 50; $i++) {
            $clinic_id = Clinic::find()->orderBy('random()')->one()->id;
            $section = new Section([
                'name' => $faker->name,
                'clinic_id' => $clinic_id,
                'status' => Section::STATUS_ACTIVE,
                'room_count' => rand(5, 25),
            ]);
            $section->save();
        }
        var_dump("Section created");

        for ($i = 0; $i < 50; $i++) {
            $clinic_id = Clinic::find()->orderBy('random()')->one()->id;
            $section_id = Section::find()->orderBy('random()')->one()->id;
            $room = new Room([
                'name' => $faker->name,
                'clinic_id' => $clinic_id,
                'status' => Room::STATUS_ACTIVE,
                'bed_count' => rand(2, 5),
                'type' => rand(1, 3),
                'section_id' => $section_id
            ]);
            $room->save();
        }

        for ($i = 0; $i < 10; $i++) {
            $model = new VaccinationClass([
                'name' => $faker->name,
                'status' => VaccinationClass::STATUS_ACTIVE,
            ]);
            $model->save();
        }
        var_dump("vaccination class created");

        for ($i = 0; $i < 50; $i++) {
            $vaccination_class_id = VaccinationClass::find()->orderBy('random()')->one()->id;
            $model = new Vaccination([
                'name' => $faker->name,
                'status' => VaccinationClass::STATUS_ACTIVE,
                'vaccination_class_id' => $vaccination_class_id,
                'time' => rand(1, 5)
            ]);
            $model->save();
        }


        var_dump("Data full success created");


    }

}