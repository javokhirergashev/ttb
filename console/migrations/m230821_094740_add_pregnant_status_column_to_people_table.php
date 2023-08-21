<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%people}}`.
 */
class m230821_094740_add_pregnant_status_column_to_people_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%people}}', 'pregnant_status', $this->integer()->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%people}}', 'pregnant_status');
    }
}
