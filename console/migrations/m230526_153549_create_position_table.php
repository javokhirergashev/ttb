<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%position}}`.
 */
class m230526_153549_create_position_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%position}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'status' => $this->integer(),
            'type' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%position}}');
    }
}
