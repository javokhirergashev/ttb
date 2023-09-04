<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%reference}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%people}}`
 */
class m230901_171309_add_people_id_column_to_reference_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%reference}}', 'people_id', $this->integer());

        // creates index for column `people_id`
        $this->createIndex(
            '{{%idx-reference-people_id}}',
            '{{%reference}}',
            'people_id'
        );

        // add foreign key for table `{{%people}}`
        $this->addForeignKey(
            '{{%fk-reference-people_id}}',
            '{{%reference}}',
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
        // drops foreign key for table `{{%people}}`
        $this->dropForeignKey(
            '{{%fk-reference-people_id}}',
            '{{%reference}}'
        );

        // drops index for column `people_id`
        $this->dropIndex(
            '{{%idx-reference-people_id}}',
            '{{%reference}}'
        );

        $this->dropColumn('{{%reference}}', 'people_id');
    }
}
