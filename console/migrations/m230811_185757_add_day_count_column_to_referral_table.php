<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%referral}}`.
 */
class m230811_185757_add_day_count_column_to_referral_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%referral}}', 'day_count', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%referral}}', 'day_count');
    }
}
