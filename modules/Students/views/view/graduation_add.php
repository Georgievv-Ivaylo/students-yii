<?php
use app\modules\Students\models\Degree;
use app\modules\Students\models\Professor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\Students\models\Exam;
?>

<h1 class="text-center"><?= Html::encode($pageTitle) ?></h1>
<?php
$form = ActiveForm::begin([
	'id' => 'graduation-add',
	'options' => ['class' => 'form']
]);
?>
	<div class="form-row">
		<?= $form->field($model, 'name', ['options' => ['class' => 'form-group col-md-6 p-1']])->label('Your Name:') ?>
		<?= $form->field($model, 'professor_id', ['options' => ['class' => 'form-group col-md-6 p-1']])->dropdownList(
			ArrayHelper::map(Professor::find()->all(), 'id', 'name'),
			['prompt'=>'Select Professor']
		)->label('Professor:')?>
		<div class="clear"></div>
	</div>
	<div class="form-row">
		<?= $form->field($model, 'degree_id', ['options' => ['class' => 'form-group col-md-6 p-1']])->dropdownList(
			ArrayHelper::map(Degree::find()->all(), 'id', 'name'),
			['prompt'=>'Select Degree']
		)->label('Degree in:')?>
		<?= $form->field($model, 'exam_id', ['options' => ['class' => 'form-group col-md-6 p-1']])->dropdownList(
			ArrayHelper::map(Exam::find()->all(), 'id', 'name'),
			['prompt'=>'Select Exam']
		)->label('Exam by:')?>
		<div class="clear"></div>
	</div>
	<div class="form-row">
		<?= $form->field($model, 'work_title', ['options' => ['class' => 'form-group col-md-6 p-1']])->label('Work Title:') ?>
		<div class="clear"></div>
	</div>

  <div class="form-group center-block">
   	 <?= Html::submitButton('Add', ['class' => 'btn btn-lg btn-primary col-lg-2']) ?>
		<div class="clear"></div>
  </div>
<?php ActiveForm::end() ?>