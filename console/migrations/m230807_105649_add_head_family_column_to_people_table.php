<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%people}}`.
 */
class m230807_105649_add_head_family_column_to_people_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%people}}', 'head_family', $this->integer()->defaultValue(2));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%people}}', 'head_family');
    }
}
