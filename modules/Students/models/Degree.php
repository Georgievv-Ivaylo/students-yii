<?php

namespace app\modules\Students\models;

use yii\db\ActiveRecord;

class Degree extends ActiveRecord
{
	public static function tableName()
	{
		return 'degrees';
	}

	public function getStudents()
	{
		return $this->hasMany(Student::className(), ['degree_id' => 'id']);
	}
}

