<?php

namespace app\modules\Students\models;

class JoinDataStudents extends Student
{
	public $professor;
	public $degree;
	public $exam;

	public function rules()
	{
		return [
				[['professor', 'degree', 'exam'], 'safe'],
		];
	}
}