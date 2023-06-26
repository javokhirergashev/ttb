<?php

namespace frontend\widgets;

use yii\bootstrap5\Widget;

class Banner extends Widget
{
    public $type;

    public function run()
    {
        $models = \common\models\Banner::find()->where(['status' => \common\models\Banner::STATUS_ACTIVE, 'type' => $this->type])->all();
        return $this->render('banner',[
            'models' => $models
        ]);
    }
}