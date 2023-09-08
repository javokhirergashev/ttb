<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%referral}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%clinic}}`
 * - `{{%peopel}}`
 * - `{{%diagnosis_list}}`
 * - `{{%section}}`
 * - `{{%user}}`
 * - `{{%user}}`
 */
class m230727_095614_create_referral_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%referral}}', [
            'id' => $this->primaryKey(),
            'clinic_id' => $this->integer(),
            'type' => $this->integer(),
            'reason' => $this->string(),
            'people_id' => $this->integer(),
            'diagnosis_list_id' => $this->integer(),
            'section_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'status' => $this->integer(),
        ]);

        // creates index for column `clinic_id`
        $this->createIndex(
            '{{%idx-referral-clinic_id}}',
            '{{%referral}}',
            'clinic_id'
        );

        // add foreign key for table `{{%clinic}}`
        $this->addForeignKey(
            '{{%fk-referral-clinic_id}}',
            '{{%referral}}',
            'clinic_id',
            '{{%clinic}}',
            'id',
            'CASCADE'
        );

        // creates index for column `people_id`
        $this->createIndex(
            '{{%idx-referral-people_id}}',
            '{{%referral}}',
            'people_id'
        );

        // add foreign key for table `{{%peopel}}`
        $this->addForeignKey(
            '{{%fk-referral-people_id}}',
            '{{%referral}}',
            'people_id',
            '{{%people}}',
            'id',
            'CASCADE'
        );

        // creates index for column `diagnosis_list_id`
        $this->createIndex(
            '{{%idx-referral-diagnosis_list_id}}',
            '{{%referral}}',
            'diagnosis_list_id'
        );

        // add foreign key for table `{{%diagnosis_list}}`
        $this->addForeignKey(
            '{{%fk-referral-diagnosis_list_id}}',
            '{{%referral}}',
            'diagnosis_list_id',
            '{{%diagnosis_list}}',
            'id',
            'CASCADE'
        );

        // creates index for column `section_id`
        $this->createIndex(
            '{{%idx-referral-section_id}}',
            '{{%referral}}',
            'section_id'
        );

        // add foreign key for table `{{%section}}`
        $this->addForeignKey(
            '{{%fk-referral-section_id}}',
            '{{%referral}}',
            'section_id',
            '{{%section}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-referral-created_by}}',
            '{{%referral}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-referral-created_by}}',
            '{{%referral}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-referral-updated_by}}',
            '{{%referral}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-referral-updated_by}}',
            '{{%referral}}',
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
        // drops foreign key for table `{{%clinic}}`
        $this->dropForeignKey(
            '{{%fk-referral-clinic_id}}',
            '{{%referral}}'
        );

        // drops index for column `clinic_id`
        $this->dropIndex(
            '{{%idx-referral-clinic_id}}',
            '{{%referral}}'
        );

        // drops foreign key for table `{{%peopel}}`
        $this->dropForeignKey(
            '{{%fk-referral-people_id}}',
            '{{%referral}}'
        );

        // drops index for column `people_id`
        $this->dropIndex(
            '{{%idx-referral-people_id}}',
            '{{%referral}}'
        );

        // drops foreign key for table `{{%diagnosis_list}}`
        $this->dropForeignKey(
            '{{%fk-referral-diagnosis_list_id}}',
            '{{%referral}}'
        );

        // drops index for column `diagnosis_list_id`
        $this->dropIndex(
            '{{%idx-referral-diagnosis_list_id}}',
            '{{%referral}}'
        );

        // drops foreign key for table `{{%section}}`
        $this->dropForeignKey(
            '{{%fk-referral-section_id}}',
            '{{%referral}}'
        );

        // drops index for column `section_id`
        $this->dropIndex(
            '{{%idx-referral-section_id}}',
            '{{%referral}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-referral-created_by}}',
            '{{%referral}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-referral-created_by}}',
            '{{%referral}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-referral-updated_by}}',
            '{{%referral}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-referral-updated_by}}',
            '{{%referral}}'
        );

        $this->dropTable('{{%referral}}');
    }
}
