<?php

namespace common\models;

use common\modules\country\models\District;
use common\modules\country\models\Quarter;
use common\modules\country\models\Region;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "qvp".
 *
 * @property int         $id
 * @property string|null $title
 * @property string|null $address
 * @property string|null $phone_number
 * @property int|null    $status
 * @property int|null    $type
 * @property int|null    $created_at
 * @property int|null    $updated_at
 * @property string|null $number
 * @property int|null    $quarter_id
 * @property int|null    $district_id
 * @property int|null    $region_id
 *
 * @property District    $district
 * @property Quarter     $quarter
 * @property Region      $region
 */
class Qvp extends \yii\db\ActiveRecord
{
    const TYPE_CLINIC = 1;
    const TYPE_QVP = 2;

    const STATUS_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qvp';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'created_at', 'updated_at', 'quarter_id', 'district_id', 'region_id'], 'default', 'value' => null],
            [['status'], 'default', 'value' => self::STATUS_ACTIVE],
            [['status', 'type', 'created_at', 'updated_at', 'quarter_id', 'district_id', 'region_id'], 'integer'],
            [['title', 'address', 'phone_number', 'number'], 'string', 'max' => 255],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::class, 'targetAttribute' => ['district_id' => 'id']],
            [['quarter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quarter::class, 'targetAttribute' => ['quarter_id' => 'id']],
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
            'title' => 'Title',
            'address' => 'Address',
            'phone_number' => 'Phone Number',
            'status' => 'Status',
            'type' => 'Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'number' => 'Number',
            'quarter_id' => 'Quarter ID',
            'district_id' => 'District ID',
            'region_id' => 'Region ID',
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
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Region::class, ['id' => 'region_id']);
    }

    public function getTypeValue()
    {
        if ($this->type == self::TYPE_QVP) {
            return "Qvp";
        }
        return "Klinika";
    }

    public function getStatusValue()
    {
        if ($this->status == self::STATUS_ACTIVE) {
            return "Active";
        }
        return "No Active";
    }
}
