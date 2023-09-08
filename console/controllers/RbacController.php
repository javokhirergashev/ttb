<?php

namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{

    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll();

        // Create roles
        $adminRole = $auth->createRole('admin');
        $editorRole = $auth->createRole('editor');

        // Add roles to the RBAC system
        $auth->add($adminRole);
        $auth->add($editorRole);

        echo "Roles added successfully.\n";
    }
}