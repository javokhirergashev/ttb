<?php

namespace common\modules\country\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "quarter_uz".
 *
 * @property int         $id
 * @property int|null    $district_id
 * @property string|null $name
 * @property int|null    $status
 * @property int|null    $top
 *
 * @property District    $district
 */
class Quarter extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'quarter';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['district_id', 'status', 'top'], 'default', 'value' => null],
            [['district_id', 'status', 'top'], 'integer'],
            [['name'], 'safe'],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => District::className(), 'targetAttribute' => ['district_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'district_id' => 'District ID',
            'name' => 'Name',
            'status' => 'Status',
            'top' => 'Top',
        ];
    }

    /**
     * Gets query for [[District]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasOne(District::className(), ['id' => 'district_id']);
    }

    public static function getDropDownList($cat_id)
    {
        if ($cat_id) {
            return self::find()
                ->select("id, (name->>'" . Yii::$app->language . "') as name")
                ->asArray()
                ->andWhere(['district_id' => $cat_id])
                ->all();
        }

        return ArrayHelper::map(static::find()->orderBy(['id' => SORT_DESC])->andWhere(['district_id' => District::YANGIQORGON_ID])->all(), 'id', 'name.' . \Yii::$app->language);
    }
}
