<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%people}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%region}}`
 * - `{{%district}}`
 * - `{{%quarter}}`
 * - `{{%qvp}}`
 */
class m230706_123109_create_people_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%people}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(),
            'last_name' => $this->string(),
            'middle_name' => $this->string(),
            'status' => $this->integer(),
            'pinfl' => $this->string(),
            'passport_number' => $this->string(),
            'phone_number' => $this->string(),
            'birthday' => $this->string(),
            'region_id' => $this->integer(),
            'district_id' => $this->integer(),
            'quarter_id' => $this->integer(),
            'qvp_id' => $this->integer(),
            'metrka_number' => $this->string(),
            'gender' => $this->integer(),
            'territory_code' => $this->string(),
        ]);

        // creates index for column `region_id`
        $this->createIndex(
            '{{%idx-people-region_id}}',
            '{{%people}}',
            'region_id'
        );

        // add foreign key for table `{{%region}}`
        $this->addForeignKey(
            '{{%fk-people-region_id}}',
            '{{%people}}',
            'region_id',
            '{{%region}}',
            'id',
            'CASCADE'
        );

        // creates index for column `district_id`
        $this->createIndex(
            '{{%idx-people-district_id}}',
            '{{%people}}',
            'district_id'
        );

        // add foreign key for table `{{%district}}`
        $this->addForeignKey(
            '{{%fk-people-district_id}}',
            '{{%people}}',
            'district_id',
            '{{%district}}',
            'id',
            'CASCADE'
        );

        // creates index for column `quarter_id`
        $this->createIndex(
            '{{%idx-people-quarter_id}}',
            '{{%people}}',
            'quarter_id'
        );

        // add foreign key for table `{{%quarter}}`
        $this->addForeignKey(
            '{{%fk-people-quarter_id}}',
            '{{%people}}',
            'quarter_id',
            '{{%quarter}}',
            'id',
            'CASCADE'
        );

        // creates index for column `qvp_id`
        $this->createIndex(
            '{{%idx-people-qvp_id}}',
            '{{%people}}',
            'qvp_id'
        );

        // add foreign key for table `{{%qvp}}`
        $this->addForeignKey(
            '{{%fk-people-qvp_id}}',
            '{{%people}}',
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
        // drops foreign key for table `{{%region}}`
        $this->dropForeignKey(
            '{{%fk-people-region_id}}',
            '{{%people}}'
        );

        // drops index for column `region_id`
        $this->dropIndex(
            '{{%idx-people-region_id}}',
            '{{%people}}'
        );

        // drops foreign key for table `{{%district}}`
        $this->dropForeignKey(
            '{{%fk-people-district_id}}',
            '{{%people}}'
        );

        // drops index for column `district_id`
        $this->dropIndex(
            '{{%idx-people-district_id}}',
            '{{%people}}'
        );

        // drops foreign key for table `{{%quarter}}`
        $this->dropForeignKey(
            '{{%fk-people-quarter_id}}',
            '{{%people}}'
        );

        // drops index for column `quarter_id`
        $this->dropIndex(
            '{{%idx-people-quarter_id}}',
            '{{%people}}'
        );

        // drops foreign key for table `{{%qvp}}`
        $this->dropForeignKey(
            '{{%fk-people-qvp_id}}',
            '{{%people}}'
        );

        // drops index for column `qvp_id`
        $this->dropIndex(
            '{{%idx-people-qvp_id}}',
            '{{%people}}'
        );

        $this->dropTable('{{%people}}');
    }
}
