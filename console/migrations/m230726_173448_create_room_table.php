<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%room}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%section}}`
 * - `{{%clinic}}`
 */
class m230726_173448_create_room_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%room}}', [
            'id' => $this->primaryKey(),
            'section_id' => $this->integer(),
            'bed_count' => $this->integer(),
            'type' => $this->integer(),
            'status' => $this->integer(),
            'clinic_id' => $this->integer(),
            'name' => $this->string(),
        ]);

        // creates index for column `section_id`
        $this->createIndex(
            '{{%idx-room-section_id}}',
            '{{%room}}',
            'section_id'
        );

        // add foreign key for table `{{%section}}`
        $this->addForeignKey(
            '{{%fk-room-section_id}}',
            '{{%room}}',
            'section_id',
            '{{%section}}',
            'id',
            'CASCADE'
        );

        // creates index for column `clinic_id`
        $this->createIndex(
            '{{%idx-room-clinic_id}}',
            '{{%room}}',
            'clinic_id'
        );

        // add foreign key for table `{{%clinic}}`
        $this->addForeignKey(
            '{{%fk-room-clinic_id}}',
            '{{%room}}',
            'clinic_id',
            '{{%clinic}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%section}}`
        $this->dropForeignKey(
            '{{%fk-room-section_id}}',
            '{{%room}}'
        );

        // drops index for column `section_id`
        $this->dropIndex(
            '{{%idx-room-section_id}}',
            '{{%room}}'
        );

        // drops foreign key for table `{{%clinic}}`
        $this->dropForeignKey(
            '{{%fk-room-clinic_id}}',
            '{{%room}}'
        );

        // drops index for column `clinic_id`
        $this->dropIndex(
            '{{%idx-room-clinic_id}}',
            '{{%room}}'
        );

        $this->dropTable('{{%room}}');
    }
}
