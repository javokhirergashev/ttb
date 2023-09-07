<?php

use yii\db\Migration;

/**
 * Class m230905_115145_alter_menu_table
 */
class m230905_115145_alter_menu_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute('alter table menu rename to menus');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->execute('alter table menus rename to menu');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230905_115145_alter_menu_table cannot be reverted.\n";

        return false;
    }
    */
}
