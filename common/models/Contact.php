<?php

namespace common\models;

use common\behaviors\ConvertBehaviors;

/**
 * This is the model class for table "contact".
 *
 * @property int         $id
 * @property string|null $title
 * @property string|null $value
 * @property string|null $slug
 * @property string|null $icon
 */
class Contact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'contact';
    }

    public function behaviors()
    {
        return [
            'convertBehavior' => [
                'class' => ConvertBehaviors::class,
                'attributes' => ['title']
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'safe'],
            [['value', 'slug', 'icon'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Sarlavha',
            'value' => 'Qiymati',
            'slug' => 'Kalit so\'z',
            'icon' => 'Ikonka',
        ];
    }


    public static function getContact($slug)
    {
        $model = static::findOne(['slug' => $slug]);
        if (! $model) {
            $model = new Contact();
        }
        return $model;
    }
}
