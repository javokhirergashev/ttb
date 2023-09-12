<?php

namespace api\controllers;

class DefaultController extends \yii\rest\Controller
{

    public function actions()
    {
        return [
            'options' => [
                'class' => \yii\rest\OptionsAction::class
            ]
        ];

    }


    public function actionIndex()
    {
        return [
            'Welcome to Task management api'
        ];
    }
}