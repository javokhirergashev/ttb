<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%queue}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%people}}`
 */
class m230710_161804_add_people_id_column_to_queue_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%queue}}', 'people_id', $this->integer());
        $this->addColumn('{{%queue}}', 'passport_number', $this->string());
        $this->addColumn('{{%queue}}', 'metrka_number', $this->string());

        // creates index for column `people_id`
        $this->createIndex(
            '{{%idx-queue-people_id}}',
            '{{%queue}}',
            'people_id'
        );

        // add foreign key for table `{{%people}}`
        $this->addForeignKey(
            '{{%fk-queue-people_id}}',
            '{{%queue}}',
            'people_id',
            '{{%people}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%people}}`
        $this->dropForeignKey(
            '{{%fk-queue-people_id}}',
            '{{%queue}}'
        );

        // drops index for column `people_id`
        $this->dropIndex(
            '{{%idx-queue-people_id}}',
            '{{%queue}}'
        );

        $this->dropColumn('{{%queue}}', 'people_id');
        $this->dropColumn('{{%queue}}', 'passport_number');
        $this->dropColumn('{{%queue}}', 'metrka_number');
    }
}
