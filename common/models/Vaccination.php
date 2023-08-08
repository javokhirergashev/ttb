<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vaccination".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $time
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
            [['status'], 'integer'],
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
            'time' => 'Emlash yoshi',
            'status' => 'Status',
        ];
    }
}
