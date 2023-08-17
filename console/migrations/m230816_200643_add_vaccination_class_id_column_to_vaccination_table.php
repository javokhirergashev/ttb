<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%vaccination}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%vaccination_class}}`
 */
class m230816_200643_add_vaccination_class_id_column_to_vaccination_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%vaccination}}', 'vaccination_class_id', $this->integer());

        // creates index for column `vaccination_class_id`
        $this->createIndex(
            '{{%idx-vaccination-vaccination_class_id}}',
            '{{%vaccination}}',
            'vaccination_class_id'
        );

        // add foreign key for table `{{%vaccination_class}}`
        $this->addForeignKey(
            '{{%fk-vaccination-vaccination_class_id}}',
            '{{%vaccination}}',
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
            '{{%fk-vaccination-vaccination_class_id}}',
            '{{%vaccination}}'
        );

        // drops index for column `vaccination_class_id`
        $this->dropIndex(
            '{{%idx-vaccination-vaccination_class_id}}',
            '{{%vaccination}}'
        );

        $this->dropColumn('{{%vaccination}}', 'vaccination_class_id');
    }
}
