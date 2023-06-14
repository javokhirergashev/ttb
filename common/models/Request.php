<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "request".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $phone_number
 * @property string|null $comment
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $status
 */
class Request extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'request';
    }

    const STATUS_PENDING = 1;
    const STATUS_VIEWED = 2;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'first_name', 'last_name', 'phone_number'], 'required'],
            [['comment'], 'string'],
            [['status'], 'default', 'value' => self::STATUS_PENDING],
            [['created_at', 'updated_at', 'status'], 'integer'],
            [['title', 'first_name', 'last_name', 'phone_number'], 'string', 'max' => 255],
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
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone_number' => 'Phone Number',
            'comment' => 'Comment',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }
}
