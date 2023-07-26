<?php

namespace common\models;

use common\behaviors\ConvertBehaviors;
use Yii;

/**
 * This is the model class for table "banner".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property int|null $status
 * @property int|null $type
 * @property string|null $image
 * @property string|null $link
 * @property int|null $sort
 */
class Banner extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    const TYPE_HOME = 1;
    const TYPE_SERVICE = 2;
    const TYPE_ABOUT = 3;


    public function behaviors()
    {
        return [
            'convertBehavior' => [
                'class' => ConvertBehaviors::class,
                'attributes' => ['title', 'description']
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'banner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description'], 'safe'],
            [['status'], 'default', 'value' => self::STATUS_ACTIVE],
            [['status', 'type', 'sort'], 'integer'],
            [['image', 'link'], 'string', 'max' => 255],
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
            'description' => 'Izoh',
            'status' => 'Status',
            'type' => 'Turi',
            'image' => 'Rasm',
            'link' => 'Link',
            'sort' => 'Saralash',
        ];
    }
}
