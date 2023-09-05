<?php

namespace common\models;

use common\behaviors\ConvertBehaviors;
use Yii;

/**
 * This is the model class for table "menu".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $type
 * @property int|null $status
 * @property int|null $parent_id
 *
 * @property Menu[] $menus
 * @property Menu $parent
 */
class Menu extends \yii\db\ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'menus';
    }
    public function behaviors()
    {
        return [
            'convertBehavior' => [
                'class' => ConvertBehaviors::class,
                'attributes' => ['title']
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'safe'],
            [['type', 'status', 'parent_id'], 'default', 'value' => null],
            [['type', 'status', 'parent_id'], 'integer'],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Menu::class, 'targetAttribute' => ['parent_id' => 'id']],
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
            'type' => 'Turi',
            'status' => 'Status',
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * Gets query for [[Menus]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMenus()
    {
        return $this->hasMany(Menu::class, ['parent_id' => 'id']);
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Menu::class, ['id' => 'parent_id']);
    }
}
