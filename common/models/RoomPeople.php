<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "room_people".
 *
 * @property int $id
 * @property int|null $room_id
 * @property int|null $people_id
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $status
 * @property int|null $day
 * @property int|null $leave_date
 *
 * @property People $people
 * @property Room $room
 */
class RoomPeople extends \yii\db\ActiveRecord
{
    const STATUS_START = 1;
    const STATUS_LEAVED = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'room_people';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_id', 'people_id', 'created_at', 'updated_at', 'status', 'day', 'leave_date'], 'default', 'value' => null],
            [['room_id', 'people_id', 'created_at', 'updated_at', 'status', 'day', 'leave_date'], 'integer'],
            [['people_id'], 'exist', 'skipOnError' => true, 'targetClass' => People::class, 'targetAttribute' => ['people_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Room::class, 'targetAttribute' => ['room_id' => 'id']],
            [['referral_id'], 'exist', 'skipOnError' => true, 'targetClass' => Referral::class, 'targetAttribute' => ['referral_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_id' => 'Room ID',
            'people_id' => 'People ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
            'day' => 'Day',
            'leave_date' => 'Leave Date',
        ];
    }

    /**
     * Gets query for [[People]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPeople()
    {
        return $this->hasOne(People::class, ['id' => 'people_id']);
    }

    /**
     * Gets query for [[Room]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Room::class, ['id' => 'room_id']);
    }


//    public function getStatusName()
//    {
//        if ($this->status == self::STATUS_START) {
//            return '<span class="badge badge-info">Bekor qilindi</span>';
//        } elseif ($this->status == self::STATUS_PENDING) {
//            return '<span class="badge badge-info">Kutilmoqda</span>';
//        }
//        return '<span class="badge badge-success">Tasdiqlandi</span>';
//    }
}
