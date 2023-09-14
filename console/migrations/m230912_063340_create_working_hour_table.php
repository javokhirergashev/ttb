<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%working_hour}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m230912_063340_create_working_hour_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%working_hour}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'type' => $this->integer(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-working_hour-user_id}}',
            '{{%working_hour}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-working_hour-user_id}}',
            '{{%working_hour}}',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-working_hour-user_id}}',
            '{{%working_hour}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-working_hour-user_id}}',
            '{{%working_hour}}'
        );

        $this->dropTable('{{%working_hour}}');
    }
}
