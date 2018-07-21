<?php

namespace app\modules\Students\models;

use yii\base\Model;

class GraduationDeleteForm extends Model
{
	public $id;

	public static function tableName()
	{
		return 'students';
	}

	public function rules()
	{
		return [
				[['id'], 'required'],
		];
	}
}

