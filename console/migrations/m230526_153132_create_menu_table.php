<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%menu}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%menu}}`
 */
class m230526_153132_create_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%menu}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'type' => $this->integer(),
            'status' => $this->integer(),
            'parent_id' => $this->integer(),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            '{{%idx-menu-parent_id}}',
            '{{%menu}}',
            'parent_id'
        );

        // add foreign key for table `{{%menu}}`
        $this->addForeignKey(
            '{{%fk-menu-parent_id}}',
            '{{%menu}}',
            'parent_id',
            '{{%menu}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%menu}}`
        $this->dropForeignKey(
            '{{%fk-menu-parent_id}}',
            '{{%menu}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            '{{%idx-menu-parent_id}}',
            '{{%menu}}'
        );

        $this->dropTable('{{%menu}}');
    }
}
