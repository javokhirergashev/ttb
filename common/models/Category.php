<?php

namespace common\models;

use common\behaviors\ConvertBehaviors;
use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $icon
 * @property int|null $parent_id
 * @property int|null $status
 * @property int|null $type
 *
 * @property Category[] $categories
 * @property News[] $news
 * @property Category $parent
 */
class Category extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }


    public function behaviors()
    {
        return [
            'convertBehavior' => [
                'class' => ConvertBehaviors::class,
                'attributes' => ['title'] // Bu yerga titl , description hammasini yozsa boladi
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
            [['parent_id', 'status', 'type'], 'default', 'value' => null],
            [['parent_id', 'status', 'type'], 'integer'],
            [['icon'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['parent_id' => 'id']],
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
            'icon' => 'Ikonka',
            'parent_id' => 'Parent ID',
            'status' => 'Status',
            'type' => 'Turi',
        ];
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::class, ['parent_id' => 'id']);
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::class, ['category_id' => 'id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Category::class, ['id' => 'parent_id']);
    }
}
