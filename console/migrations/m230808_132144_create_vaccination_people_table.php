<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%vaccination_people}}`.
 */
class m230808_132144_create_vaccination_people_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%vaccination_people}}', [
            'id' => $this->primaryKey(),
            'people_id' => $this->integer(),
            'vaccination_id' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%vaccination_people}}');
    }
}
