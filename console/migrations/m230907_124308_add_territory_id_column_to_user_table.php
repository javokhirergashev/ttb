<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%territory}}`
 */
class m230907_124308_add_territory_id_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'territory_id', $this->integer());

        // creates index for column `territory_id`
        $this->createIndex(
            '{{%idx-user-territory_id}}',
            '{{%user}}',
            'territory_id'
        );

        // add foreign key for table `{{%territory}}`
        $this->addForeignKey(
            '{{%fk-user-territory_id}}',
            '{{%user}}',
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
            '{{%fk-user-territory_id}}',
            '{{%user}}'
        );

        // drops index for column `territory_id`
        $this->dropIndex(
            '{{%idx-user-territory_id}}',
            '{{%user}}'
        );

        $this->dropColumn('{{%user}}', 'territory_id');
    }
}
