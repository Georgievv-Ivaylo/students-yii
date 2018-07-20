<?php

namespace app\modules\Students\models;

use yii\db\ActiveRecord;

class Exam extends ActiveRecord
{
	public static function tableName()
	{
		return 'exams';
	}

	public function getStudents()
	{
		return $this->hasMany(Student::className(), ['exam_id' => 'id']);
	}
}

