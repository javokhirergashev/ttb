<?php

namespace common\migrations\rbac;


use common\models\User;
use common\rbac\Migration;

class Permissions extends Migration
{
    public function up()
    {
        $managerRole = $this->auth->getRole(User::ROLE_MANAGE);
        $administratorRole = $this->auth->getRole(User::ROLE_ADMINISTRATOR);

        $loginToBackend = $this->auth->createPermission('loginToBackend');
        $this->auth->add($loginToBackend);

        $this->auth->addChild($managerRole, $loginToBackend);
        $this->auth->addChild($administratorRole, $loginToBackend);
    }

    public function down()
    {
        $this->auth->remove($this->auth->getPermission('loginToBackend'));
    }
}
