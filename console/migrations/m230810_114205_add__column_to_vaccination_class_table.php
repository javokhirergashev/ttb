<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%vaccination_class}}`.
 */
class m230810_114205_add__column_to_vaccination_class_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%vaccination_class}}', 'name', $this->string());
        $this->addColumn('{{%vaccination_class}}', 'status', $this->integer()->defaultValue(2));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%vaccination_class}}', 'name');
        $this->dropColumn('{{%vaccination_class}}', 'status');
    }
}
