<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 */
class m230526_154903_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'title' => $this->text(),
            'description' => $this->text(),
            'poster' => $this->string(),
            'main_image' => $this->string(),
            'status' => $this->integer(),
            'published_at' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'type' => $this->integer(),
            'category_id' => $this->integer(),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-news-category_id}}',
            '{{%news}}',
            'category_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-news-category_id}}',
            '{{%news}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-news-category_id}}',
            '{{%news}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-news-category_id}}',
            '{{%news}}'
        );

        $this->dropTable('{{%news}}');
    }
}
