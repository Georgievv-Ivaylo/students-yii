<?php

use yii\db\Migration;

/**
 * Handles the creation of table `professors`.
 */
class m180717_000910_create_professors_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('professors', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'created_on' => $this->timestamp()->defaultValue(['expression'=>'CURRENT_TIMESTAMP']),
            'edited_on' => $this->timestamp()->defaultValue(['expression'=>'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP']),
            'deleted_on' => $this->string(20)->notNull()->defaultValue(1),
        ]);
        $this->createIndex(
		        'idx-professors-deleted_on',
		        'professors',
		        'deleted_on'
        );
        $this->insert('professors', [
        		'name'=>'Peter Parker'
        ]);
        $this->insert('professors', [
        		'name'=>'Michele Corleone'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
	    	$this->delete('professors', ['id' => 2]);
	    	$this->delete('professors', ['id' => 1]);
	    	$this->dropForeignKey(
			    	'fk-professors-deleted_on',
			    	'professors'
	    	);
        $this->dropTable('professors');
    }
}
