<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%diagnosis}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%diagnosis_list}}`
 */
class m230718_174927_add_complaint_column_to_diagnosis_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%diagnosis}}', 'complaint', $this->string());
        $this->addColumn('{{%diagnosis}}', 'diagnosis', $this->string());
        $this->addColumn('{{%diagnosis}}', 'anamnez', $this->string());
        $this->addColumn('{{%diagnosis}}', 'conclusion', $this->string());
        $this->addColumn('{{%diagnosis}}', 'diagnosis_list_id', $this->integer());

        // creates index for column `diagnosis_list_id`
        $this->createIndex(
            '{{%idx-diagnosis-diagnosis_list_id}}',
            '{{%diagnosis}}',
            'diagnosis_list_id'
        );

        // add foreign key for table `{{%diagnosis_list}}`
        $this->addForeignKey(
            '{{%fk-diagnosis-diagnosis_list_id}}',
            '{{%diagnosis}}',
            'diagnosis_list_id',
            '{{%diagnosis_list}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%diagnosis_list}}`
        $this->dropForeignKey(
            '{{%fk-diagnosis-diagnosis_list_id}}',
            '{{%diagnosis}}'
        );

        // drops index for column `diagnosis_list_id`
        $this->dropIndex(
            '{{%idx-diagnosis-diagnosis_list_id}}',
            '{{%diagnosis}}'
        );

        $this->dropColumn('{{%diagnosis}}', 'complaint');
        $this->dropColumn('{{%diagnosis}}', 'diagnosis');
        $this->dropColumn('{{%diagnosis}}', 'anamnez');
        $this->dropColumn('{{%diagnosis}}', 'conclusion');
        $this->dropColumn('{{%diagnosis}}', 'diagnosis_list_id');
    }
}
