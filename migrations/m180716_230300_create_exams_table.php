<?php

use yii\db\Migration;

/**
 * Handles the creation of table `exams`.
 */
class m180716_230300_create_exams_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('exams', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
        		'created_on' => $this->timestamp()->defaultValue(['expression'=>'CURRENT_TIMESTAMP']),
        		'edited_on' => $this->timestamp()->defaultValue(['expression'=>'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP']),
        		'deleted_on' => $this->string(20)->notNull()->defaultValue(1)
        ]);
        $this->createIndex(
		        'idx-exams-deleted_on',
		        'exams',
		        'deleted_on'
        );
        $this->insert('exams', [
        		'name'=>'Dissertation work'
        ]);
        $this->insert('exams', [
        		'name'=>'Diploma work'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    		$this->delete('exams', ['id' => 2]);
    		$this->delete('exams', ['id' => 1]);
    		$this->dropForeignKey(
		    		'fk-exams-deleted_on',
		    		'exams'
    		);
        $this->dropTable('exams');
    }
}
