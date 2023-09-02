<?php

namespace common\models;


/**
 * This is the model class for table "reference".
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $status
 * @property int|null $type
 * @property string|null $reason
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property string|null $where_to
 *
 * @property User $user
 * @property People $people
 */
class Reference extends \yii\db\ActiveRecord
{


    const TYPE_086 = 1;
    const TYPE_083 = 2;

    const STATUS_START = 1;
    const STATUS_FINISHED = 2;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reference';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'status', 'type', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'default', 'value' => null],
            [['user_id', 'people_id', 'status', 'type', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['reason', 'where_to'], 'string', 'max' => 255],
            [['type'], 'default', 'value' => self::TYPE_086],
            [['status'], 'default', 'value' => self::STATUS_START],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['people_id'], 'exist', 'skipOnError' => true, 'targetClass' => People::class, 'targetAttribute' => ['people_id' => 'id']],
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
            'status' => 'Status',
            'type' => 'Type',
            'reason' => 'Reason',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'where_to' => 'Where To',
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


    public function getPeople()
    {
        return $this->hasOne(People::class, ['id' => 'people_id']);
    }


    public static function getTypeList()
    {
        return [
            self::TYPE_086 => "086",
            self::TYPE_083 => "083",
        ];
    }

    public function getTypeName()
    {
        return self::getTypeList()[$this->type];
    }

    public function getStatusList()
    {
        return [
            self::STATUS_START => "Aktiv",
            self::STATUS_FINISHED => "Tugallangan",
        ];
    }

    public function getReferenceDiagnosis()
    {
        return $this->hasMany(ReferenceDiagnosis::class, ['reference_id' => 'id']);
    }


    public function isMainDoctor()
    {
        return $this->getReferenceDiagnosis()->andWhere(['position' => ReferenceDiagnosis::POSITION_MAIN_DOCTOR])->exists();
    }
}
