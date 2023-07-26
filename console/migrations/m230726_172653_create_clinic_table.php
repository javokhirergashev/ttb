<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%clinic}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%user}}`
 * - `{{%region}}`
 * - `{{%district}}`
 */
class m230726_172653_create_clinic_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%clinic}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'description' => $this->string(),
            'status' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'region_id' => $this->integer(),
            'district_id' => $this->integer(),
            'type' => $this->integer(),
            'address' => $this->string(),
            'phone_number' => $this->string(),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-clinic-created_by}}',
            '{{%clinic}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-clinic-created_by}}',
            '{{%clinic}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `updated_by`
        $this->createIndex(
            '{{%idx-clinic-updated_by}}',
            '{{%clinic}}',
            'updated_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-clinic-updated_by}}',
            '{{%clinic}}',
            'updated_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );

        // creates index for column `region_id`
        $this->createIndex(
            '{{%idx-clinic-region_id}}',
            '{{%clinic}}',
            'region_id'
        );

        // add foreign key for table `{{%region}}`
        $this->addForeignKey(
            '{{%fk-clinic-region_id}}',
            '{{%clinic}}',
            'region_id',
            '{{%region}}',
            'id',
            'CASCADE'
        );

        // creates index for column `district_id`
        $this->createIndex(
            '{{%idx-clinic-district_id}}',
            '{{%clinic}}',
            'district_id'
        );

        // add foreign key for table `{{%district}}`
        $this->addForeignKey(
            '{{%fk-clinic-district_id}}',
            '{{%clinic}}',
            'district_id',
            '{{%district}}',
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
            '{{%fk-clinic-created_by}}',
            '{{%clinic}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-clinic-created_by}}',
            '{{%clinic}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-clinic-updated_by}}',
            '{{%clinic}}'
        );

        // drops index for column `updated_by`
        $this->dropIndex(
            '{{%idx-clinic-updated_by}}',
            '{{%clinic}}'
        );

        // drops foreign key for table `{{%region}}`
        $this->dropForeignKey(
            '{{%fk-clinic-region_id}}',
            '{{%clinic}}'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            '{{%idx-clinic-region_id}}',
            '{{%clinic}}'
        );

        // drops foreign key for table `{{%district}}`
        $this->dropForeignKey(
            '{{%fk-clinic-district_id}}',
            '{{%clinic}}'
        );

        // drops index for column `district_id`
        $this->dropIndex(
            '{{%idx-clinic-district_id}}',
            '{{%clinic}}'
        );

        $this->dropTable('{{%clinic}}');
    }
}
