<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 */
class m230526_154047_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'icon' => $this->string(),
            'parent_id' => $this->integer(),
            'status' => $this->integer(),
            'type' => $this->integer(),
        ]);

        // creates index for column `parent_id`
        $this->createIndex(
            '{{%idx-category-parent_id}}',
            '{{%category}}',
            'parent_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-category-parent_id}}',
            '{{%category}}',
            'parent_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-category-parent_id}}',
            '{{%category}}'
        );

        // drops index for column `parent_id`
        $this->dropIndex(
            '{{%idx-category-parent_id}}',
            '{{%category}}'
        );

        $this->dropTable('{{%category}}');
    }
}
