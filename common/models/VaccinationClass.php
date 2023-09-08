<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "vaccination_class".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $status
 *
 * @property VaccinationPeople[] $vaccinationPeoples
 */
class VaccinationClass extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vaccination_class';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'default', 'value' => null],
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nomi',
            'status' => 'Statusi',
        ];
    }

    /**
     * Gets query for [[VaccinationPeoples]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVaccinationPeoples()
    {
        return $this->hasMany(VaccinationPeople::class, ['vaccination_class_id' => 'id']);
    }

    public static function getDropDownList()
    {
        return ArrayHelper::map(static::find()->andWhere(['status' => self::STATUS_ACTIVE])->all(), 'id', 'name');
    }
}
