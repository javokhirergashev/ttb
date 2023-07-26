<?php

namespace common\models;

use common\behaviors\ConvertBehaviors;
use common\behaviors\DateTimeBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $poster
 * @property string|null $main_image
 * @property int|null $status
 * @property int|null $published_at
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $type
 * @property int|null $category_id
 *
 * @property Category $category
 */
class News extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    public function behaviors()
    {
        return [
            'convertBehavior' => [
                'class' => ConvertBehaviors::class,
                'attributes' => ['title', 'description']
            ],
            TimestampBehavior::class,
            'date_publish_date' => [
                'class' => DateTimeBehavior::class,
                'attribute' => 'published_at', //атрибут модели, который будем менять
                'format' => 'dd.MM.yyyy HH:mm',   //формат вывода даты для пользователя
//                'default' => 'today'
            ]
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'category_id'], 'safe'],
            [['status', 'published_at', 'created_at', 'updated_at', 'type', 'category_id'], 'default', 'value' => null],
            [['status', 'type'], 'integer'],
            [['created_at'], 'safe'],
            [['poster', 'main_image'], 'string', 'max' => 255],
//            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Nomi',
            'description' => 'Izoh',
            'poster' => 'Poster',
            'main_image' => 'Asosiy rasm',
            'status' => 'Status',
            'published_at' => 'Chop etish vaqti',
            'created_at' => 'Yaratilgan vaqti',
            'updated_at' => 'Tahrirlangan vaqti',
            'type' => 'Turi',
            'category_id' => 'Kategoriya',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getPrettyTitle()
    {
        return $this->title[Yii::$app->language];
    }

    public function getPrettyDescription()
    {
        return $this->description[Yii::$app->language];
    }
}
