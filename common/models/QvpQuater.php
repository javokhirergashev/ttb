<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "qvp_quater".
 *
 * @property int $id
 * @property int|null $quarter_id
 * @property int|null $qvp_id
 *
 * @property Quarter $quarter
 * @property Qvp $qvp
 */
class QvpQuater extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'qvp_quater';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['quarter_id', 'qvp_id'], 'default', 'value' => null],
            [['quarter_id', 'qvp_id'], 'integer'],
            [['quarter_id'], 'exist', 'skipOnError' => true, 'targetClass' => Quarter::class, 'targetAttribute' => ['quarter_id' => 'id']],
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
            'quarter_id' => 'Quarter ID',
            'qvp_id' => 'Qvp ID',
        ];
    }

    /**
     * Gets query for [[Quarter]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuarter()
    {
        return $this->hasOne(Quarter::class, ['id' => 'quarter_id']);
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
