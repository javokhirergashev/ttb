<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%vaccination_people}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%vaccination_class}}`
 */
class m230810_133203_add__column_to_vaccination_people_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%vaccination_people}}', 'vaccination_class_id', $this->integer());

        // creates index for column `vaccination_class_id`
        $this->createIndex(
            '{{%idx-vaccination_people-vaccination_class_id}}',
            '{{%vaccination_people}}',
            'vaccination_class_id'
        );

        // add foreign key for table `{{%vaccination_class}}`
        $this->addForeignKey(
            '{{%fk-vaccination_people-vaccination_class_id}}',
            '{{%vaccination_people}}',
            'vaccination_class_id',
            '{{%vaccination_class}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%vaccination_class}}`
        $this->dropForeignKey(
            '{{%fk-vaccination_people-vaccination_class_id}}',
            '{{%vaccination_people}}'
        );

        // drops index for column `vaccination_class_id`
        $this->dropIndex(
            '{{%idx-vaccination_people-vaccination_class_id}}',
            '{{%vaccination_people}}'
        );

        $this->dropColumn('{{%vaccination_people}}', 'vaccination_class_id');
    }
}
