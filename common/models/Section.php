<?php

namespace common\models;

use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "section".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $clinic_id
 * @property int|null $status
 * @property int|null $room_count
 *
 * @property Clinic $clinic
 * @property Room[] $rooms
 */
class Section extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'section';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['clinic_id', 'status', 'room_count'], 'default', 'value' => null],
            [['clinic_id', 'status', 'room_count'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['clinic_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clinic::class, 'targetAttribute' => ['clinic_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Bo\'lim nomi',
            'clinic_id' => 'Shifoxona',
            'status' => 'Status',
            'room_count' => 'Xonalar soni',
        ];
    }

    /**
     * Gets query for [[Clinic]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClinic()
    {
        return $this->hasOne(Clinic::class, ['id' => 'clinic_id']);
    }

    /**
     * Gets query for [[Rooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::class, ['section_id' => 'id']);
    }

    public static function getDropDownList($clinic_id = null)
    {
        if ($clinic_id) {
            return static::find()
                ->andWhere(['clinic_id' => $clinic_id])
                ->andWhere(['status' => self::STATUS_ACTIVE])
                ->select(['id', 'name'])
                ->asArray()->all();
        }
        return ArrayHelper::map(static::find()->andWhere(['status' => self::STATUS_ACTIVE])->all(), 'id', 'name');
    }
}
