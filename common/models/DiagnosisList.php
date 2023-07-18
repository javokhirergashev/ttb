<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "diagnosis_list".
 *
 * @property int $id
 * @property int|null $diagnosis_class_id
 * @property int|null $diagnosis_group_id
 * @property string|null $name
 * @property string|null $description
 * @property int|null $status
 */
class DiagnosisList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'diagnosis_list';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['diagnosis_class_id', 'diagnosis_group_id', 'status'], 'default', 'value' => null],
            [['diagnosis_class_id', 'diagnosis_group_id', 'status'], 'integer'],
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
            'diagnosis_group_id' => 'Diagnosis Group ID',
            'name' => 'Name',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }

    public static function getDropDownList()
    {
        return ArrayHelper::map(static::find()->all(), 'id', 'name');
    }
}
