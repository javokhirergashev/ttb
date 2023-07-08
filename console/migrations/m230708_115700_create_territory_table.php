<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%territory}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%qvp}}`
 */
class m230708_115700_create_territory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%territory}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'status' => $this->integer(),
            'address' => $this->string(),
            'people_count' => $this->string(),
            'home_count' => $this->string(),
            'qvp_id' => $this->integer(),
        ]);

        // creates index for column `qvp_id`
        $this->createIndex(
            '{{%idx-territory-qvp_id}}',
            '{{%territory}}',
            'qvp_id'
        );

        // add foreign key for table `{{%qvp}}`
        $this->addForeignKey(
            '{{%fk-territory-qvp_id}}',
            '{{%territory}}',
            'qvp_id',
            '{{%qvp}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%qvp}}`
        $this->dropForeignKey(
            '{{%fk-territory-qvp_id}}',
            '{{%territory}}'
        );

        // drops index for column `qvp_id`
        $this->dropIndex(
            '{{%idx-territory-qvp_id}}',
            '{{%territory}}'
        );

        $this->dropTable('{{%territory}}');
    }
}
