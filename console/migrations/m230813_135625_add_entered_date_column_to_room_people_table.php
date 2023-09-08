<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%room_people}}`.
 */
class m230813_135625_add_entered_date_column_to_room_people_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%room_people}}', 'entered_date', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%room_people}}', 'entered_date');
    }
}
