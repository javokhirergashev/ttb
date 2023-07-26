<?php

namespace common\models;

use common\behaviors\ConvertBehaviors;
use Yii;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property string|null $client_full_name
 * @property string|null $comment
 * @property string|null $image
 * @property int|null $status
 */
class Comments extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    public function behaviors()
    {
        return [
            'convertBehavior' => [
                'class' => ConvertBehaviors::class,
                'attributes' => ['comment'] // Bu yerga titl , description hammasini yozsa boladi
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'default', 'value' => null],
            [['status'], 'integer'],
            [['client_full_name', 'comment', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_full_name' => 'Client Full Name',
            'comment' => 'Comment',
            'image' => 'Image',
            'status' => 'Status',
        ];
    }
}
