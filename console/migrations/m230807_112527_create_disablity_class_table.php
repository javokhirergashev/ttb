<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%disablity_class}}`.
 */
class m230807_112527_create_disablity_class_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%disablity_class}}', [
            'id' => $this->primaryKey(),
            'name' => $this->text(),
            'status' => $this->integer()->defaultValue(2)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%disablity_class}}');
    }
}
