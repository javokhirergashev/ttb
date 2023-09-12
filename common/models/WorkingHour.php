<?php

namespace common\models;

use MongoDB\BSON\Timestamp;
use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "working_hour".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $type
 *
 * @property User $user
 */
class WorkingHour extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'working_hour';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'created_at', 'updated_at', 'type'], 'integer'],
            [['user_id', 'type'], 'required'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'type' => 'Type',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function fields()
    {
        return [
            'id',
            'created_at',
            'user',
            'type'
        ];
    }
}
