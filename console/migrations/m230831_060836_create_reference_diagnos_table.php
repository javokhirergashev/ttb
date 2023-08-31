<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%reference_diagnos}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%reference}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m230831_060836_create_reference_diagnos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%reference_diagnosis}}', [
            'id' => $this->primaryKey(),
            'reference_id' => $this->integer(),
            'diagnosis' => $this->string(),
            'position' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        // creates index for column `reference_id`
        $this->createIndex(
            '{{%idx-reference_diagnos-reference_id}}',
            '{{%reference_diagnosis}}',
            'reference_id'
        );

        // add foreign key for table `{{%reference}}`
        $this->addForeignKey(
            '{{%fk-reference_diagnosis-reference_id}}',
            '{{%reference_diagnosis}}',
            'reference_id',
            '{{%reference}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-reference_diagnosis-created_by}}',
            '{{%reference_diagnosis}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-reference_diagnos-created_by}}',
            '{{%reference_diagnosis}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-reference_diagnosis-updated_by}}',
            '{{%reference_diagnosis}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-reference_diagnosis-updated_by}}',
            '{{%reference_diagnosis}}',
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
        // drops foreign key for table `{{%reference}}`
        $this->dropForeignKey(
            '{{%fk-reference_diagnosis-reference_id}}',
            '{{%reference_diagnosis}}'
        );

        // drops index for column `reference_id`
        $this->dropIndex(
            '{{%idx-reference_diagnosis-reference_id}}',
            '{{%reference_diagnosis}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-reference_diagnosis-created_by}}',
            '{{%reference_diagnosis}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-reference_diagnosis-created_by}}',
            '{{%reference_diagnosis}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-reference_diagnosis-updated_by}}',
            '{{%reference_diagnosis}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-reference_diagnosis-updated_by}}',
            '{{%reference_diagnosis}}'
        );

        $this->dropTable('{{%reference_diagnosis}}');
    }
}
