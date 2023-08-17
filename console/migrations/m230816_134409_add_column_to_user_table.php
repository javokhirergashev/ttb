<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%user}}`.
 */
class m230816_134409_add_column_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'gender', $this->integer());
        $this->addColumn('{{%user}}', 'category', $this->integer());
        $this->addColumn('{{%user}}', 'rate', $this->integer());
        $this->addColumn('{{%user}}', 'retired', $this->integer());
        $this->addColumn('{{%user}}', 'decree', $this->integer());
        $this->addColumn('{{%user}}', 'disabled', $this->integer());
        $this->addColumn('{{%user}}', 'deputy', $this->integer());
        $this->addColumn('{{%user}}', 'qualification_date', $this->integer());
        $this->addColumn('{{%user}}', 'hayfsan', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'gender');
        $this->dropColumn('{{%user}}', 'category');
        $this->dropColumn('{{%user}}', 'rate');
        $this->dropColumn('{{%user}}', 'birthday');
        $this->dropColumn('{{%user}}', 'retired');
        $this->dropColumn('{{%user}}', 'decree');
        $this->dropColumn('{{%user}}', 'disabled');
        $this->dropColumn('{{%user}}', 'deputy');
        $this->dropColumn('{{%user}}', 'qualification_date');
        $this->dropColumn('{{%user}}', 'hayfsan');
    }
}
