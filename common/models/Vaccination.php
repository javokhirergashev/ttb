<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "vaccination".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $time
 * @property string|null $vaccination_class_id
 * @property int|null $status
 */
class Vaccination extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vaccination';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'default', 'value' => null],
            [['status', 'vaccination_class_id'], 'integer'],
            [['name', 'time'], 'string', 'max' => 255],
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
            'vaccination_class_id' => 'Emlash sinfi',
            'time' => 'Emlash yoshi',
            'status' => 'Status',
        ];
    }
    public function getVacclass()
    {
        return $this->hasOne(VaccinationClass::class, ['id' => 'vaccination_class_id']);
    }
    public static function getDropDownList()
    {
        return ArrayHelper::map(static::find()->andWhere(['status' => self::STATUS_ACTIVE])->all(), 'id', 'name');
    }
}
