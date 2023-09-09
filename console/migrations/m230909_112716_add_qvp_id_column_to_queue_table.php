<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%queue}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%qvp}}`
 */
class m230909_112716_add_qvp_id_column_to_queue_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%queue}}', 'qvp_id', $this->integer());

        // creates index for column `qvp_id`
        $this->createIndex(
            '{{%idx-queue-qvp_id}}',
            '{{%queue}}',
            'qvp_id'
        );

        // add foreign key for table `{{%qvp}}`
        $this->addForeignKey(
            '{{%fk-queue-qvp_id}}',
            '{{%queue}}',
            'qvp_id',
            '{{%qvp}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%qvp}}`
        $this->dropForeignKey(
            '{{%fk-queue-qvp_id}}',
            '{{%queue}}'
        );

        // drops index for column `qvp_id`
        $this->dropIndex(
            '{{%idx-queue-qvp_id}}',
            '{{%queue}}'
        );

        $this->dropColumn('{{%queue}}', 'qvp_id');
    }
}
