<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%diagnosis_class}}`.
 */
class m230718_133816_create_diagnosis_class_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%diagnosis_class}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(),
            'status'=> $this->tinyInteger()->defaultValue(1)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%diagnosis_class}}');
    }
}
