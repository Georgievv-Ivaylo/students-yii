<?php

namespace app\modules\Students\models;

use yii\base\Model;

class GraduationAddForm extends Model
{
	public $name;
	public $professor_id;
	public $degree_id;
	public $exam_id;
	public $work_title;

	public static function tableName()
	{
		return 'students';
	}

	public function rules()
	{
		return [
				[['name', 'work_title'], 'required'],
				[
						['professor_id', 'degree_id', 'exam_id'],
						'required',
						'message'=>'Please choose from available {attribute}.'
				],
		];
	}

	public function attributeLabels()
	{
		return [
				'professor_id' => 'Professors',
				'degree_id' => 'Degrees',
				'exam_id' => 'Exams',
		];
	}
}

