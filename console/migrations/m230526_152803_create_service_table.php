<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%service}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m230526_152803_create_service_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%service}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'description' => $this->text(),
            'content' => $this->text(),
            'status' => $this->integer(),
            'image' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'icon' => $this->string(),
            'type' => $this->integer(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-service-created_by}}',
            '{{%service}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-service-created_by}}',
            '{{%service}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-service-updated_by}}',
            '{{%service}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-service-updated_by}}',
            '{{%service}}',
            'updated_by',
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
            '{{%fk-service-created_by}}',
            '{{%service}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-service-created_by}}',
            '{{%service}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-service-updated_by}}',
            '{{%service}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-service-updated_by}}',
            '{{%service}}'
        );

        $this->dropTable('{{%service}}');
    }
}
