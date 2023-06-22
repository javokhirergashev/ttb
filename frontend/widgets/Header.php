<?php

namespace frontend\widgets;

use common\models\Contacts;
use common\models\Menu;
use yii\bootstrap5\Widget;

class Header extends Widget
{
    public function run()
    {

        return $this->render('header');
    }
}