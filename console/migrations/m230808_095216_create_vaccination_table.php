<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vaccination}}`.
 */
class m230808_095216_create_vaccination_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vaccination}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'time' => $this->string(),
            'status' => $this->integer()->defaultValue(2)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vaccination}}');
    }
}
