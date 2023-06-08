<?php

use common\models\User;
use yii\db\Migration;

class m130524_201442_init extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // https://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'phone_number' => $this->string()->notNull(),
            'first_name' => $this->string(255),
            'last_name' => $this->string(255),
            'email' => $this->string(255),
            'username' => $this->string(255),
            'type' => $this->integer(),
            'role' => $this->integer(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string(),
            'created_at' => $this->integer()->notNull()->defaultValue(time()),
            'updated_at' => $this->integer()->notNull()->defaultValue(time()),
            'deleted_at' => $this->integer(),
            'avatar_id' => $this->integer(),
            'status' => $this->smallInteger()->notNull()->defaultValue(User::STATUS_INACTIVE),
        ], $tableOptions);

        $this->insert('{{%user}}', [
            'phone_number' => '+998111234567',
            'username' => 'admin@admin.loc',
            'role' => \common\models\User::ROLE_ADMIN,
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('admin123'),
            'created_at' => date('U'),
            'updated_at' => date('U'),
            'status' => \common\models\User::STATUS_ACTIVE
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%user}}');
    }
}
