<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%people}}`.
 */
class m230711_050033_add_passport_seria_column_to_people_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%people}}', 'passport_seria', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%people}}', 'passport_seria');
    }
}
