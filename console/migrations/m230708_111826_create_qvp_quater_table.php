<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%qvp_quater}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%quarter}}`
 * - `{{%qvp}}`
 */
class m230708_111826_create_qvp_quater_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%qvp_quater}}', [
            'id' => $this->primaryKey(),
            'quarter_id' => $this->integer(),
            'qvp_id' => $this->integer(),
        ]);

        // creates index for column `quarter_id`
        $this->createIndex(
            '{{%idx-qvp_quater-quarter_id}}',
            '{{%qvp_quater}}',
            'quarter_id'
        );

        // add foreign key for table `{{%quarter}}`
        $this->addForeignKey(
            '{{%fk-qvp_quater-quarter_id}}',
            '{{%qvp_quater}}',
            'quarter_id',
            '{{%quarter}}',
            'id',
            'CASCADE'
        );

        // creates index for column `qvp_id`
        $this->createIndex(
            '{{%idx-qvp_quater-qvp_id}}',
            '{{%qvp_quater}}',
            'qvp_id'
        );

        // add foreign key for table `{{%qvp}}`
        $this->addForeignKey(
            '{{%fk-qvp_quater-qvp_id}}',
            '{{%qvp_quater}}',
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
        // drops foreign key for table `{{%quarter}}`
        $this->dropForeignKey(
            '{{%fk-qvp_quater-quarter_id}}',
            '{{%qvp_quater}}'
        );

        // drops index for column `quarter_id`
        $this->dropIndex(
            '{{%idx-qvp_quater-quarter_id}}',
            '{{%qvp_quater}}'
        );

        // drops foreign key for table `{{%qvp}}`
        $this->dropForeignKey(
            '{{%fk-qvp_quater-qvp_id}}',
            '{{%qvp_quater}}'
        );

        // drops index for column `qvp_id`
        $this->dropIndex(
            '{{%idx-qvp_quater-qvp_id}}',
            '{{%qvp_quater}}'
        );

        $this->dropTable('{{%qvp_quater}}');
    }
}
