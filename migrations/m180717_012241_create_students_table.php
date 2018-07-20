<?php

use yii\db\Migration;

/**
 * Handles the creation of table `students`.
 * Has foreign keys to the tables:
 *
 * - `professors`
 * - `degrees`
 * - `exams`
 */
class m180717_012241_create_students_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('students', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'professor_id' => $this->integer(6)->notNull(),
            'degree_id' => $this->integer(6)->notNull(),
            'exam_id' => $this->integer(6)->notNull(),
            'work_title' => $this->string(100)->notNull(),
            'created_on' => $this->timestamp()->defaultValue(['expression'=>'CURRENT_TIMESTAMP']),
            'edited_on' => $this->timestamp()->defaultValue(['expression'=>'CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP']),
            'deleted_on' => $this->string(20)->notNull()->defaultValue(1)
        ]);

        // creates index for column `professor_id`
        $this->createIndex(
            'idx-students-professor_id',
            'students',
            'professor_id'
        );

        // add foreign key for table `professors`
        $this->addForeignKey(
            'fk-students-professor_id',
            'students',
            'professor_id',
            'professors',
            'id',
            'CASCADE'
        );

        // creates index for column `degree_id`
        $this->createIndex(
            'idx-students-degree_id',
            'students',
            'degree_id'
        );

        // add foreign key for table `degrees`
        $this->addForeignKey(
            'fk-students-degree_id',
            'students',
            'degree_id',
            'degrees',
            'id',
            'CASCADE'
        );

        // creates index for column `exam_id`
        $this->createIndex(
            'idx-students-exam_id',
            'students',
            'exam_id'
        );

        // add foreign key for table `exams`
        $this->addForeignKey(
            'fk-students-exam_id',
            'students',
            'exam_id',
            'exams',
            'id',
            'CASCADE'
        );

        $this->createIndex(
		        'idx-students-deleted_on',
		        'students',
		        'deleted_on'
        );

        $this->insert('students', [
        		'name'=>'Peter Rabbit',
        		'professor_id'=>'1',
        		'degree_id'=>'1',
        		'exam_id'=>'1',
        		'work_title'=>'Rabbits in wild.'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
    		$this->delete('students', ['id' => 1]);

        // drops foreign key for table `professors`
        $this->dropForeignKey(
            'fk-students-professor_id',
            'students'
        );

        // drops index for column `professor_id`
        $this->dropIndex(
            'idx-students-professor_id',
            'students'
        );

        // drops foreign key for table `degrees`
        $this->dropForeignKey(
            'fk-students-degree_id',
            'students'
        );

        // drops index for column `degree_id`
        $this->dropIndex(
            'idx-students-degree_id',
            'students'
        );

        // drops foreign key for table `exams`
        $this->dropForeignKey(
            'fk-students-exam_id',
            'students'
        );

        // drops index for column `exam_id`
        $this->dropIndex(
            'idx-students-exam_id',
            'students'
        );

        $this->dropForeignKey(
		        'fk-students-deleted_on',
		        'students'
        );

        $this->dropTable('students');
    }
}
