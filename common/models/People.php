<?php

namespace common\models;

use common\modules\country\models\District;
use common\modules\country\models\Quarter;
use common\modules\country\models\Region;
use Yii;

/**
 * This is the model class for table "people".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $middle_name
 * @property int|null $status
 * @property string|null $pinfl
 * @property string|null $passport_number
 * @property string|null $phone_number
 * @property string|null $birthday
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
    public static function tableName()
    {
        return 'people';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'region_id', 'district_id', 'quarter_id', 'qvp_id', 'gender'], 'default', 'value' => null],
            [['status', 'region_id', 'district_id', 'quarter_id', 'qvp_id', 'gender'], 'integer'],
            [['first_name', 'last_name', 'middle_name', 'pinfl', 'passport_number', 'phone_number', 'birthday', 'metrka_number', 'territory_code'], 'string', 'max' => 255],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::class, 'targetAttribute' => ['district_id' => 'id']],
            [['quarter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quarter::class, 'targetAttribute' => ['quarter_id' => 'id']],
            [['qvp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Qvp::class, 'targetAttribute' => ['qvp_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Region::class, 'targetAttribute' => ['region_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'middle_name' => 'Middle Name',
            'status' => 'Status',
            'pinfl' => 'Pinfl',
            'passport_number' => 'Passport Number',
            'phone_number' => 'Phone Number',
            'birthday' => 'Birthday',
            'region_id' => 'Region ID',
            'district_id' => 'District ID',
            'quarter_id' => 'Quarter ID',
            'qvp_id' => 'Qvp ID',
            'metrka_number' => 'Metrka Number',
            'gender' => 'Gender',
            'territory_code' => 'Territory Code',
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
}
