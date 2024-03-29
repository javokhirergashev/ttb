<?php

namespace common\models;

use common\behaviors\ConvertBehaviors;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "position".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $status
 * @property int|null $type
 *
 * @property User[] $users
 */
class Position extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position';
    }

    public function behaviors()
    {
        return [
            'convertBehavior' => [
                'class' => ConvertBehaviors::class,
                'attributes' => ['title']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'safe'],
            [['status', 'type'], 'default', 'value' => null],
            [['status', 'type'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Nomi',
            'status' => 'Status',
            'type' => 'turi',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['position_id' => 'id']);
    }

    public static function getPositionTitle()
    {
        return ArrayHelper::map(Position::find()->where(['status' => Position::STATUS_ACTIVE])->all(), 'id', 'title.'.Yii::$app->language);
    }

}
