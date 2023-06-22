<?php

namespace frontend\widgets;


use common\models\Contact;
use common\models\Menu;
use yii\bootstrap5\Widget;

class Header extends Widget
{
    public function run()
    {
        $models = Contact::find()->all();
        return $this->render('header', compact($models));
    }
}