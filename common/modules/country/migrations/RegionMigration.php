<?php


namespace common\modules\country\migrations;


use Yii;
use yii\db\Migration;

class RegionMigration extends Migration
{

    public $table = '{{%region}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'name' => $this->json(),
            'status' => $this->integer()->defaultValue(1),
            'top' => $this->integer(2)->defaultValue(0),
        ]);

        $regionSql = file_get_contents(Yii::getAlias('common') . '/modules/country/migrations/data/region.sql');
        $this->Exe($regionSql);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable($this->table);
    }


    public function Exe($str)
    {
        $db = Yii::$app->db;
        $data = explode(";", $str);
        foreach ($data as $index => $datum) {
            $db->createCommand($datum)->execute();
        }
    }

}
