<?php

namespace app\modules\Students\models;

use yii\db\ActiveRecord;

class Professor extends ActiveRecord
{
	public static function tableName()
	{
		return 'professors';
	}

	public function getStudents()
	{
		return $this->hasMany(Student::className(), ['professor_id' => 'id']);
	}
}

