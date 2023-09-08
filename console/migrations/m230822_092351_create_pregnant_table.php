<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pregnant}}`.
 */
class m230822_092351_create_pregnant_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%pregnant}}', [
            'id' => $this->primaryKey(),
            'person_id' => $this->integer(),
            'diagnosis_id' => $this->string(),
            'description' => $this->string(),
            'height' => $this->integer(),
            'weight_height_index' => $this->integer(),
            'weight' => $this->integer(),
            'pulse' => $this->integer(),
            'blood_pressure' => $this->integer(),
            'pregnant_week' => $this->integer(),
            'utt_conclusion' => $this->text(),
            'stomach_diameter' => $this->integer(),
        ]);
        // add foreign key for table `{{%people}}`
        $this->addForeignKey(
            '{{%fk-pregnant-person_id}}',
            '{{%pregnant}}',
            'person_id',
            '{{%people}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pregnant}}');
    }

}
