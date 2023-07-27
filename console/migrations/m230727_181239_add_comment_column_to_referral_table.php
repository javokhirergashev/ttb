<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%referral}}`.
 */
class m230727_181239_add_comment_column_to_referral_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%referral}}', 'comment', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%referral}}', 'comment');
    }
}
