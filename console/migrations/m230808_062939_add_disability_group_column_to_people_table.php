<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%people}}`.
 */
class m230808_062939_add_disability_group_column_to_people_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%people}}', 'disability_group', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%people}}', 'disability_group');
    }
}
