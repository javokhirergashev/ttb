<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%diagnosis}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 * - `{{%user}}`
 * - `{{%people}}`
 */
class m230711_174503_create_diagnosis_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%diagnosis}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'description' => $this->text(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'type' => $this->integer(),
            'status' => $this->integer(),
            'doctor_id' => $this->integer(),
            'people_id' => $this->integer(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-diagnosis-created_by}}',
            '{{%diagnosis}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-diagnosis-created_by}}',
            '{{%diagnosis}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-diagnosis-updated_by}}',
            '{{%diagnosis}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-diagnosis-updated_by}}',
            '{{%diagnosis}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `doctor_id`
        $this->createIndex(
            '{{%idx-diagnosis-doctor_id}}',
            '{{%diagnosis}}',
            'doctor_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-diagnosis-doctor_id}}',
            '{{%diagnosis}}',
            'doctor_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `people_id`
        $this->createIndex(
            '{{%idx-diagnosis-people_id}}',
            '{{%diagnosis}}',
            'people_id'
        );

        // add foreign key for table `{{%people}}`
        $this->addForeignKey(
            '{{%fk-diagnosis-people_id}}',
            '{{%diagnosis}}',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-diagnosis-created_by}}',
            '{{%diagnosis}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-diagnosis-created_by}}',
            '{{%diagnosis}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-diagnosis-updated_by}}',
            '{{%diagnosis}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-diagnosis-updated_by}}',
            '{{%diagnosis}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-diagnosis-doctor_id}}',
            '{{%diagnosis}}'
        );

        // drops index for column `doctor_id`
        $this->dropIndex(
            '{{%idx-diagnosis-doctor_id}}',
            '{{%diagnosis}}'
        );

        // drops foreign key for table `{{%people}}`
        $this->dropForeignKey(
            '{{%fk-diagnosis-people_id}}',
            '{{%diagnosis}}'
        );

        // drops index for column `people_id`
        $this->dropIndex(
            '{{%idx-diagnosis-people_id}}',
            '{{%diagnosis}}'
        );

        $this->dropTable('{{%diagnosis}}');
    }
}
