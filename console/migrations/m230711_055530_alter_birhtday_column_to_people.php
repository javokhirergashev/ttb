<?php

use yii\db\Migration;

/**
 * Class m230711_055530_alter_birhtday_column_to_people
 */
class m230711_055530_alter_birhtday_column_to_people extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE people ALTER COLUMN birthday TYPE INT USING birthday::INT");
    }

    /**
     * {@inheritdoc}
     */

    public function safeDown()
    {
        $this->execute("ALTER TABLE people ALTER COLUMN birthday TYPE VARCHAR USING birthday::VARCHAR");

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m230711_055530_alter_birhtday_column_to_people cannot be reverted.\n";

        return false;
    }
    */
}
