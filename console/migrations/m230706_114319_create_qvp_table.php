<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%qvp}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%quarter}}`
 * - `{{%district}}`
 * - `{{%region}}`
 */
class m230706_114319_create_qvp_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%qvp}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'address' => $this->string(),
            'phone_number' => $this->string(),
            'status' => $this->integer(),
            'type' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'number' => $this->string(),
            'quarter_id' => $this->integer(),
            'district_id' => $this->integer(),
            'region_id' => $this->integer(),
        ]);

        // creates index for column `quarter_id`
        $this->createIndex(
            '{{%idx-qvp-quarter_id}}',
            '{{%qvp}}',
            'quarter_id'
        );

        // add foreign key for table `{{%quarter}}`
        $this->addForeignKey(
            '{{%fk-qvp-quarter_id}}',
            '{{%qvp}}',
            'quarter_id',
            '{{%quarter}}',
            'id',
            'CASCADE'
        );

        // creates index for column `district_id`
        $this->createIndex(
            '{{%idx-qvp-district_id}}',
            '{{%qvp}}',
            'district_id'
        );

        // add foreign key for table `{{%district}}`
        $this->addForeignKey(
            '{{%fk-qvp-district_id}}',
            '{{%qvp}}',
            'district_id',
            '{{%district}}',
            'id',
            'CASCADE'
        );

        // creates index for column `region_id`
        $this->createIndex(
            '{{%idx-qvp-region_id}}',
            '{{%qvp}}',
            'region_id'
        );

        // add foreign key for table `{{%region}}`
        $this->addForeignKey(
            '{{%fk-qvp-region_id}}',
            '{{%qvp}}',
            'region_id',
            '{{%region}}',
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
            '{{%fk-qvp-quarter_id}}',
            '{{%qvp}}'
        );

        // drops index for column `quarter_id`
        $this->dropIndex(
            '{{%idx-qvp-quarter_id}}',
            '{{%qvp}}'
        );

        // drops foreign key for table `{{%district}}`
        $this->dropForeignKey(
            '{{%fk-qvp-district_id}}',
            '{{%qvp}}'
        );

        // drops index for column `district_id`
        $this->dropIndex(
            '{{%idx-qvp-district_id}}',
            '{{%qvp}}'
        );

        // drops foreign key for table `{{%region}}`
        $this->dropForeignKey(
            '{{%fk-qvp-region_id}}',
            '{{%qvp}}'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            '{{%idx-qvp-region_id}}',
            '{{%qvp}}'
        );

        $this->dropTable('{{%qvp}}');
    }
}
