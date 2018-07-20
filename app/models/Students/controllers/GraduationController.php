<?php

namespace app\models\Students\controllers;

use yii\web\Controller;

class GraduationController extends Controller
{


	public function actionIndex($message = 'Hello')
	{
		return $this->render('graduation', ['message' => $message]);
	}
}

