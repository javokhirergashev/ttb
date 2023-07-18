<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "diagnosis_class".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $status
 */
class DiagnosisClass extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diagnosis_class';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'default', 'value' => null],
            [['status'], 'integer'],
            [['name', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }
}