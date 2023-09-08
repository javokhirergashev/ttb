<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "disablity_class".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $status
 */
class DisablityClass extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'disablity_class';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string'],
            [['status'], 'default', 'value' => null],
            [['status'], 'integer'],
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

    public static function getDropDownList()
    {
        return ArrayHelper::map(static::find()->andWhere(['status' => self::STATUS_ACTIVE])->all(), 'id', 'name');
    }
}
