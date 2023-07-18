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
 *
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
            [['status', 'region_id', 'district_id', 'quarter_id', 'qvp_id', 'gender'], 'integer'],
            [['first_name', 'last_name', 'middle_name', 'pinfl', 'passport_number', 'phone_number', 'metrka_number', 'territory_code', 'passport_seria'], 'string', 'max' => 255],
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
            'territory_code' => 'Uchastka',
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
}
