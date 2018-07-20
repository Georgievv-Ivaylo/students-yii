<?php

use yii\db\Migration;

/**
 * Handles the creation of table `degrees`.
 */
class m180717_001351_create_degrees_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('degrees', [
            'id' => $this->primaryKey(),
            'name' => $this->string(20)->notNull(),
            'created_on' => $this->timestamp()->defaultValue(['expression'=>'CURRENT_TIMESTAMP']),
            'edited_on' => $this->timestamp()->defaultValue(['expression'=>'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP']),
            'deleted_on' => $this->string(20)->notNull()->defaultValue(1),
        ]);
        $this->createIndex(
	        'idx-degrees-deleted_on',
	        'degrees',
	        'deleted_on'
        );
        $this->insert('degrees', [
        		'name'=>'Bachelor'
        ]);
        $this->insert('degrees', [
        		'name'=>'Master'
        ]);
        $this->insert('degrees', [
        		'name'=>'PhD'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    		$this->delete('degrees', ['id' => 3]);
	    	$this->delete('degrees', ['id' => 2]);
	    	$this->delete('degrees', ['id' => 1]);
	    	$this->dropForeignKey(
			    	'fk-degrees-deleted_on',
			    	'degrees'
	    	);
        $this->dropTable('degrees');
    }
}
