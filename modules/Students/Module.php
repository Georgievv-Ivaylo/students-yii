<?php

namespace app\modules\Students;

use yii\base\BootstrapInterface;

class Module extends \yii\base\Module implements BootstrapInterface
{
	public function init()
	{
		parent::init();

		$this->params['foo'] = 'bar';
		// ...  other initialization code ...
	}

	public function bootstrap($app)
	{
		$app->getUrlManager()->addRules([
				[
						'class' => 'yii\web\UrlRule',
						'pattern' => $this->id,
						'route' => $this->id . '/tools/index'
				],
				[
						'class' => 'yii\web\UrlRule',
						'pattern' => $this->id . '/<controller:[\w\-]+>/<action:[\w\-]+>',
						'route' => $this->id . '/<controller>/<action>'
				],
		], false);
	}

}

