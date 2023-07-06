<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%population}}`.
 */
class m230706_065544_create_population_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%population}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%population}}');
    }
}
