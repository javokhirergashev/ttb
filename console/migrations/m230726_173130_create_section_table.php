<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%section}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%clinic}}`
 */
class m230726_173130_create_section_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%section}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'clinic_id' => $this->integer(),
            'status' => $this->integer(),
            'room_count' => $this->integer(),
        ]);

        // creates index for column `clinic_id`
        $this->createIndex(
            '{{%idx-section-clinic_id}}',
            '{{%section}}',
            'clinic_id'
        );

        // add foreign key for table `{{%clinic}}`
        $this->addForeignKey(
            '{{%fk-section-clinic_id}}',
            '{{%section}}',
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
        // drops foreign key for table `{{%clinic}}`
        $this->dropForeignKey(
            '{{%fk-section-clinic_id}}',
            '{{%section}}'
        );

        // drops index for column `clinic_id`
        $this->dropIndex(
            '{{%idx-section-clinic_id}}',
            '{{%section}}'
        );

        $this->dropTable('{{%section}}');
    }
}
