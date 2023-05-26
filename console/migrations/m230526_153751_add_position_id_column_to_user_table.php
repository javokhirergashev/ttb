<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%position}}`
 */
class m230526_153751_add_position_id_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'position_id', $this->integer());

        // creates index for column `position_id`
        $this->createIndex(
            '{{%idx-user-position_id}}',
            '{{%user}}',
            'position_id'
        );

        // add foreign key for table `{{%position}}`
        $this->addForeignKey(
            '{{%fk-user-position_id}}',
            '{{%user}}',
            'position_id',
            '{{%position}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%position}}`
        $this->dropForeignKey(
            '{{%fk-user-position_id}}',
            '{{%user}}'
        );

        // drops index for column `position_id`
        $this->dropIndex(
            '{{%idx-user-position_id}}',
            '{{%user}}'
        );

        $this->dropColumn('{{%user}}', 'position_id');
    }
}
