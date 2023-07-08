<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "territory".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $status
 * @property string|null $address
 * @property string|null $people_count
 * @property string|null $home_count
 * @property int|null $qvp_id
 *
 * @property Qvp $qvp
 */
class Territory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'territory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'qvp_id'], 'default', 'value' => null],
            [['status', 'qvp_id'], 'integer'],
            [['name', 'address', 'people_count', 'home_count'], 'string', 'max' => 255],
            [['qvp_id'], 'exist', 'skipOnError' => true, 'targetClass' => Qvp::class, 'targetAttribute' => ['qvp_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
            'address' => 'Address',
            'people_count' => 'People Count',
            'home_count' => 'Home Count',
            'qvp_id' => 'Qvp ID',
        ];
    }

    /**
     * Gets query for [[Qvp]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQvp()
    {
        return $this->hasOne(Qvp::class, ['id' => 'qvp_id']);
    }
}
