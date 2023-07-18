<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%diagnosis_list}}`.
 */
class m230718_134547_create_diagnosis_list_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%diagnosis_list}}', [
            'id' => $this->primaryKey(),
            'diagnosis_class_id' => $this->integer(),
            'diagnosis_group_id' => $this->integer(),
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
        $this->dropTable('{{%diagnosis_list}}');
    }
}
