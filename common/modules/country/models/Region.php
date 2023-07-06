<?php

namespace common\modules\country\models;

use common\components\Util;
use common\modules\tournament\models\TvQuestionItem;
use common\modules\tournament\models\TvRound;
use common\modules\user\models\User;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "region_uz".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $status
 * @property int|null $top
 * @property int|null $mspd_id
 *
 * @property District[] $districtUzs
 */
class Region extends \yii\db\ActiveRecord
{

    /**
     * @var $count
     * Bu o'zgaruvchi regionla boyicha personlani sitatistikasini olib chiqishda kerak bo'ldi
     */
    public $count;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'region';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'safe'],
            [['name'], 'required'],
            [['status', 'top'], 'default', 'value' => null],
            [['status', 'top', 'count'], 'integer'],
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
            'top' => 'Top',
        ];
    }

    /**
     * Gets query for [[DistrictUzs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDistrict()
    {
        return $this->hasMany(District::className(), ['region_id' => 'id']);
    }

    public static function getDropDownList()
    {
        return ArrayHelper::map(static::find()->all(), 'id', 'name.' . \Yii::$app->language);
    }

    public function getPrettyName()
    {
        return Util::getExistsLanguage($this->name);
    }

    public static function getSubRegionList($country_id)
    {
        return self::find()
            ->select("id, (name->>'" . Yii::$app->language . "') as name")
            ->asArray()
            ->andWhere(['country_id' => $country_id])
            ->all();
    }


    public function fields()
    {
        return [
            'id',
            'name' => function ($model) {
                return Util::getExistsLanguage($model->name);
            },
        ];
    }

}
