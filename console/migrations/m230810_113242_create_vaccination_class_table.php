<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vaccination_class}}`.
 */
class m230810_113242_create_vaccination_class_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vaccination_class}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'status' => $this->tinyInteger()->defaultValue(2)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vaccination_class}}');
    }
}
