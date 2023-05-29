<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%request}}`.
 */
class m230527_095514_create_request_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'phone_number' => $this->string(),
            'comment' => $this->text(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%request}}');
    }
}
