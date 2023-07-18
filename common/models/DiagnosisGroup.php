<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "diagnosis_group".
 *
 * @property int $id
 * @property int|null $diagnosis_class_id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $status
 */
class DiagnosisGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diagnosis_group';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['diagnosis_class_id', 'status'], 'default', 'value' => null],
            [['diagnosis_class_id', 'status'], 'integer'],
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
            'diagnosis_class_id' => 'Diagnosis Class ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }
}
