<?php

namespace common\models;

use common\behaviors\DateTimeBehavior;
use common\modules\country\models\District;
use common\modules\country\models\Quarter;
use common\modules\country\models\Region;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "people".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $middle_name
 * @property int|null $status
 * @property string|null $pinfl
 * @property string|null $passport_seria
 * @property string|null $passport_number
 * @property string|null $phone_number
 * @property integer|null $birthday
 * @property int|null $region_id
 * @property int|null $district_id
 * @property int|null $quarter_id
 * @property int|null $qvp_id
 * @property string|null $metrka_number
 * @property int|null $gender
 * @property string|null $territory_code
 * @property string|null $dispensary_control
 * @property string|null $disability_group
 * @property string|null $ayol_daftar
 * @property string|null $temir_daftar
 * @property string|null $yoshlar_daftar
 * @property string|null $job
 * @property string|null $height
 * @property string|null $weight
 * @property string|null $blood_pressure
 * @property string|null $saturation
 * @property string|null $pulse
 * @property string|null $disablity_class_id
 * @property string|null $head_family
 * @property District $district
 * @property Quarter $quarter
 * @property Qvp $qvp
 * @property Region $region
 */
class People extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $quarterIds;
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const DISPENSARY_CONTROL_TRUE = 1;
    const DISPENSARY_CONTROL_FALSE = 2;
    const AYOL_DAFTAR_TRUE = 1;
    const AYOL_DAFTAR_FALSE = 2;
    const TEMIR_DAFTAR_TRUE = 1;
    const TEMIR_DAFTAR_FALSE = 2;
    const YOSHLAR_DAFTAR_TRUE = 1;
    const YOSHLAR_DAFTAR_FALSE = 2;
    const OILA_BOSHI_TRUE = 1;
    const OILA_BOSHI_FALSE = 2;
    const DISABILITY_FIRST = 1;
    const DISABILITY_SECOND = 2;
    const DISABILITY_THIRD = 3;
    const DISABILITY_FOURTH = 4;
    const DISABILITY_FALSE= 0;

    public static function tableName()
    {
        return 'people';
    }

    public function behaviors()
    {
        return [
            'birthday' => [
                'class' => DateTimeBehavior::class,
                'attribute' => 'birthday', //атрибут модели, который будем менять
                'format' => 'dd.MM.yyyy',   //формат вывода даты для пользователя
//                'default' => 'today'
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'region_id', 'territory_id', 'district_id', 'quarter_id', 'qvp_id', 'gender', 'passport_seria'], 'default', 'value' => null],
            [['status', 'region_id', 'district_id', 'quarter_id', 'qvp_id', 'gender', 'disability_group'], 'integer'],
            [['first_name', 'last_name', 'middle_name', 'pinfl', 'passport_number', 'phone_number', 'metrka_number', 'territory_code', 'dispensary_control','ayol_daftar', 'temir_daftar', 'yoshlar_daftar', 'job', 'height', 'weight', 'blood_pressure', 'saturation', 'pulse', 'disablity_class_id', 'head_family'], 'string', 'max' => 255],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::class, 'targetAttribute' => ['district_id' => 'id']],
            [['quarter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quarter::class, 'targetAttribute' => ['quarter_id' => 'id']],
            [['qvp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Qvp::class, 'targetAttribute' => ['qvp_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::class, 'targetAttribute' => ['region_id' => 'id']],
            [['territory_id'], 'exist', 'skipOnError' => true, 'targetClass' => Territory::class, 'targetAttribute' => ['territory_id' => 'id']],
            [['quarterIds', 'birthday'], 'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'Ism',
            'last_name' => 'Familiya',
            'middle_name' => 'Otasining ismi',
            'status' => 'Status',
            'pinfl' => 'Pinfl',
            'passport_seria' => 'Passport Seriyasi',
            'passport_number' => 'Passport Raqami',
            'phone_number' => 'Telefon raqami',
            'birthday' => 'Tug\'ilgan yil',
            'region_id' => 'Viloyat',
            'district_id' => 'Tuman',
            'quarter_id' => 'Mahalla',
            'qvp_id' => 'Qvp',
            'metrka_number' => 'Metrka raqami',
            'gender' => 'Jinsi',
            'head_family' => 'Oila boshi',
            'territory_code' => 'Uchastka',
            'dispensary_control' => '"D" nazorat',
            'ayol_daftar' => 'Ayollar daftari',
            'temir_daftar' => 'Temir daftar',
            'yoshlar_daftar' => 'Yoshlar daftari',
            'job' => 'Ish joyi',
            'height' => 'Bo\'yi',
            'weight' => 'Vazni',
            'blood_pressure' => 'Qon bosimi',
            'saturation' => 'Saturatsiyasi',
            'pulse' => 'Pulsi',
            'disability_class_id' => 'Nogironlik sinfi',
            'disability_group' => 'Nogironlik guruhi',
        ];
    }

    /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::class, ['id' => 'district_id']);
    }

    /**
     * Gets query for [[Quarter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuarter()
    {
        return $this->hasOne(Quarter::class, ['id' => 'quarter_id']);
    }

    /**
     * Gets query for [[Qvp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQvp()
    {
        return $this->hasOne(Qvp::class, ['id' => 'qvp_id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::class, ['id' => 'region_id']);
    }

    public function getDiagnosis()
    {
        return $this->hasMany(Diagnosis::class, ['people_id' => 'id'])->orderBy(['id' => SORT_DESC]);
    }

    public function getTerritory()
    {
        return $this->hasOne(Territory::class, ['id' => 'territory_id']);
    }

    public function getDisablity()
    {
        return $this->hasOne(DisablityClass::class, ['id' => 'disablity_class_id']);
    }
}
