<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%queue}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%service}}`
 * - `{{%user}}`
 */
class m230527_100626_create_queue_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%queue}}', [
            'id' => $this->primaryKey(),
            'reason' => $this->string(),
            'service_id' => $this->integer(),
            'user_id' => $this->integer(),
            'status' => $this->integer(),
            'writing_time' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'phone_number' => $this->string(),
            'number' => $this->integer(),
        ]);

        // creates index for column `service_id`
        $this->createIndex(
            '{{%idx-queue-service_id}}',
            '{{%queue}}',
            'service_id'
        );

        // add foreign key for table `{{%service}}`
        $this->addForeignKey(
            '{{%fk-queue-service_id}}',
            '{{%queue}}',
            'service_id',
            '{{%service}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-queue-user_id}}',
            '{{%queue}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-queue-user_id}}',
            '{{%queue}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%service}}`
        $this->dropForeignKey(
            '{{%fk-queue-service_id}}',
            '{{%queue}}'
        );

        // drops index for column `service_id`
        $this->dropIndex(
            '{{%idx-queue-service_id}}',
            '{{%queue}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-queue-user_id}}',
            '{{%queue}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-queue-user_id}}',
            '{{%queue}}'
        );

        $this->dropTable('{{%queue}}');
    }
}
