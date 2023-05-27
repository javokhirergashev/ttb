<?php

namespace common\models;

use common\behaviors\ConvertBehaviors;
use Yii;

/**
 * This is the model class for table "faq".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property int|null $type
 * @property int|null $status
 */
class Faq extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'faq';
    }
    public function behaviors()
    {
        return [
            'convertBehavior' => [
                'class' => ConvertBehaviors::class,
                'attributes' => ['title', 'description'] // Bu yerga titl , description hammasini yozsa boladi
            ]
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'string'],
            [['type', 'status'], 'default', 'value' => null],
            [['type', 'status'], 'integer'],
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
            'description' => 'Description',
            'type' => 'Type',
            'status' => 'Status',
        ];
    }
}
