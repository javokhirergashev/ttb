<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%history}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 * - `{{%queue}}`
 */
class m230723_125659_create_history_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%history}}', [
            'id' => $this->primaryKey(),
            'from_doctor_id' => $this->integer(),
            'to_doctor_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'reason' => $this->string(),
            'queue_id' => $this->integer(),
        ]);

        // creates index for column `from_doctor_id`
        $this->createIndex(
            '{{%idx-history-from_doctor_id}}',
            '{{%history}}',
            'from_doctor_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-history-from_doctor_id}}',
            '{{%history}}',
            'from_doctor_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `to_doctor_id`
        $this->createIndex(
            '{{%idx-history-to_doctor_id}}',
            '{{%history}}',
            'to_doctor_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-history-to_doctor_id}}',
            '{{%history}}',
            'to_doctor_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `queue_id`
        $this->createIndex(
            '{{%idx-history-queue_id}}',
            '{{%history}}',
            'queue_id'
        );

        // add foreign key for table `{{%queue}}`
        $this->addForeignKey(
            '{{%fk-history-queue_id}}',
            '{{%history}}',
            'queue_id',
            '{{%queue}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-history-from_doctor_id}}',
            '{{%history}}'
        );

        // drops index for column `from_doctor_id`
        $this->dropIndex(
            '{{%idx-history-from_doctor_id}}',
            '{{%history}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-history-to_doctor_id}}',
            '{{%history}}'
        );

        // drops index for column `to_doctor_id`
        $this->dropIndex(
            '{{%idx-history-to_doctor_id}}',
            '{{%history}}'
        );

        // drops foreign key for table `{{%queue}}`
        $this->dropForeignKey(
            '{{%fk-history-queue_id}}',
            '{{%history}}'
        );

        // drops index for column `queue_id`
        $this->dropIndex(
            '{{%idx-history-queue_id}}',
            '{{%history}}'
        );

        $this->dropTable('{{%history}}');
    }
}
