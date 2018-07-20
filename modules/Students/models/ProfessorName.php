<?php

namespace app\modules\Students\models;

use yii\db\ActiveRecord;

class ProfessorName extends ActiveRecord
{
	public static function tableName()
	{
		return 'professors';
	}
}

