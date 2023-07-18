<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%diagnosis_group}}`.
 */
class m230718_134404_create_diagnosis_group_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%diagnosis_group}}', [
            'id' => $this->primaryKey(),
            'diagnosis_class_id' => $this->integer(),
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
        $this->dropTable('{{%diagnosis_group}}');
    }
}
