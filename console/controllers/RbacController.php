<?php

namespace console\controllers;

use common\models\User;
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
        $statistRole = $auth->createRole('statist');
        $hrRole = $auth->createRole('hr');
        $doctorRole = $auth->createRole('doctor');
        $nurseRole = $auth->createRole('nurse');

//        // Add roles to the RBAC system
        $auth->add($adminRole);
        $auth->add($statistRole);
        $auth->add($hrRole);
        $auth->add($doctorRole);
        $auth->add($nurseRole);

        $createPermission = $auth->createPermission('createAction');
        $updatePermission = $auth->createPermission('updateAction');
        $deletePermission = $auth->createPermission('deleteAction');

        $auth->add($createPermission);
        $auth->add($updatePermission);
        $auth->add($deletePermission);

// Add permissions to roles
        $auth->addChild($adminRole, $statistRole);
        $auth->addChild($adminRole, $hrRole);
        $auth->addChild($adminRole, $doctorRole);
        $auth->addChild($adminRole, $createPermission);
        $auth->addChild($adminRole, $updatePermission);
        $auth->addChild($adminRole, $deletePermission);

        $auth->assign($adminRole, User::ADMIN_ID);

        echo "Roles added successfully.\n";
    }
}