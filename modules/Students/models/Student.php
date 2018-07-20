<?php

namespace app\modules\Students\models;

use DateTime;
use yii\db\ActiveRecord;

class Student extends ActiveRecord
{
	public static function tableName()
	{
		return 'students';
	}

	public function getCreatedDate()
	{
		$date = new DateTime($this->created_on);
		return $date->format('d.m.Y');
	}

	public function getEditedDate()
	{
		$date = new DateTime($this->edited_on);
		return $date->format('d.m.Y H:i:s');
	}

	public function getProfessor()
	{
		return $this->hasOne(Professor::className(), ['id' => 'professor_id']);
	}
	public function getProfessorName()
	{
		return $this->hasOne(Professor::className(), ['id' => 'professor_id'])->select('name')->scalar();
	}

	public function getDegree()
	{
		return $this->hasOne(Degree::className(), ['id' => 'degree_id']);
	}
	public function getDegreeName()
	{
		return $this->hasOne(Degree::className(), ['id' => 'degree_id'])->select('name')->scalar();
	}

	public function getExam()
	{
		return $this->hasOne(Exam::className(), ['id' => 'exam_id']);
	}
	public function getExamName()
	{
		return $this->hasOne(Exam::className(), ['id' => 'exam_id'])->select('name')->scalar();
	}
}

