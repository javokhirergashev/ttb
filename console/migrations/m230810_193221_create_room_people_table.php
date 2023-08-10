<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%room_people}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%room}}`
 * - `{{%people}}`
 * - `{{%referral}}`
 */
class m230810_193221_create_room_people_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%room_people}}', [
            'id' => $this->primaryKey(),
            'room_id' => $this->integer(),
            'people_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'status' => $this->integer(),
            'day' => $this->integer(),
            'leave_date' => $this->integer(),
            'referral_id' => $this->integer(),
        ]);

        // creates index for column `room_id`
        $this->createIndex(
            '{{%idx-room_people-room_id}}',
            '{{%room_people}}',
            'room_id'
        );

        // add foreign key for table `{{%room}}`
        $this->addForeignKey(
            '{{%fk-room_people-room_id}}',
            '{{%room_people}}',
            'room_id',
            '{{%room}}',
            'id',
            'CASCADE'
        );

        // creates index for column `people_id`
        $this->createIndex(
            '{{%idx-room_people-people_id}}',
            '{{%room_people}}',
            'people_id'
        );

        // add foreign key for table `{{%people}}`
        $this->addForeignKey(
            '{{%fk-room_people-people_id}}',
            '{{%room_people}}',
            'people_id',
            '{{%people}}',
            'id',
            'CASCADE'
        );

        // creates index for column `referral_id`
        $this->createIndex(
            '{{%idx-room_people-referral_id}}',
            '{{%room_people}}',
            'referral_id'
        );

        // add foreign key for table `{{%referral}}`
        $this->addForeignKey(
            '{{%fk-room_people-referral_id}}',
            '{{%room_people}}',
            'referral_id',
            '{{%referral}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%room}}`
        $this->dropForeignKey(
            '{{%fk-room_people-room_id}}',
            '{{%room_people}}'
        );

        // drops index for column `room_id`
        $this->dropIndex(
            '{{%idx-room_people-room_id}}',
            '{{%room_people}}'
        );

        // drops foreign key for table `{{%people}}`
        $this->dropForeignKey(
            '{{%fk-room_people-people_id}}',
            '{{%room_people}}'
        );

        // drops index for column `people_id`
        $this->dropIndex(
            '{{%idx-room_people-people_id}}',
            '{{%room_people}}'
        );

        // drops foreign key for table `{{%referral}}`
        $this->dropForeignKey(
            '{{%fk-room_people-referral_id}}',
            '{{%room_people}}'
        );

        // drops index for column `referral_id`
        $this->dropIndex(
            '{{%idx-room_people-referral_id}}',
            '{{%room_people}}'
        );

        $this->dropTable('{{%room_people}}');
    }
}
