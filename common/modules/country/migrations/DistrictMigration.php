<?php


namespace common\modules\country\migrations;


use Yii;
use yii\db\Migration;

class DistrictMigration extends Migration
{

    public $table = '{{%district}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table, [
            'id' => $this->primaryKey(),
            'region_id' => $this->integer(),
            'name' => ' json',
            'status' => $this->integer()->defaultValue(1),
            'top' => $this->integer(2)->defaultValue(0),
        ]);


        $districtSql = file_get_contents(Yii::getAlias('common') . '/modules/country/migrations/data/district.sql');
        $this->Exe($districtSql);

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
