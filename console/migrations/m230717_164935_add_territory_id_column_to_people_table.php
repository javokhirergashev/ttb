<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%people}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%territory}}`
 */
class m230717_164935_add_territory_id_column_to_people_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%people}}', 'territory_id', $this->integer());

        // creates index for column `territory_id`
        $this->createIndex(
            '{{%idx-people-territory_id}}',
            '{{%people}}',
            'territory_id'
        );

        // add foreign key for table `{{%territory}}`
        $this->addForeignKey(
            '{{%fk-people-territory_id}}',
            '{{%people}}',
            'territory_id',
            '{{%territory}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%territory}}`
        $this->dropForeignKey(
            '{{%fk-people-territory_id}}',
            '{{%people}}'
        );

        // drops index for column `territory_id`
        $this->dropIndex(
            '{{%idx-people-territory_id}}',
            '{{%people}}'
        );

        $this->dropColumn('{{%people}}', 'territory_id');
    }
}
