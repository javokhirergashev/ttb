<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%pregnant}}`.
 */
class m230824_070539_add_anamnez_column_to_pregnant_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%pregnant}}', 'anamnez', $this->string());
        $this->addColumn('{{%pregnant}}', 'created_at', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%pregnant}}', 'anamnez');
        $this->dropColumn('{{%pregnant}}', 'created_at');
    }
}
