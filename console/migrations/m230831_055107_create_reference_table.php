<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reference}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m230831_055107_create_reference_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reference}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'status' => $this->integer(),
            'type' => $this->integer(),
            'reason' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'where_to' => $this->string(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-reference-user_id}}',
            '{{%reference}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-reference-user_id}}',
            '{{%reference}}',
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
            '{{%fk-reference-user_id}}',
            '{{%reference}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-reference-user_id}}',
            '{{%reference}}'
        );

        $this->dropTable('{{%reference}}');
    }
}
