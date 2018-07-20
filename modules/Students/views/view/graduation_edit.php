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
	'id' => 'graduation-edit',
	'options' => ['class' => 'form-horizontal']
]);
?>
<?= $form->field($model, 'name')->label('Your Name:') ?>
<?= $form->field($model, 'professor_id')->dropdownList(
	ArrayHelper::map(Professor::find()->all(), 'id', 'name'),
	['prompt'=>'Select Professor']
)->label('Professor:')?>
<?= $form->field($model, 'degree_id')->dropdownList(
	ArrayHelper::map(Degree::find()->all(), 'id', 'name'),
	['prompt'=>'Select Degree']
)->label('Degree in:')?>
<?= $form->field($model, 'exam_id')->dropdownList(
	ArrayHelper::map(Exam::find()->all(), 'id', 'name'),
	['prompt'=>'Select Exam']
)->label('Exam by:')?>
<?= $form->field($model, 'work_title')->label('Work Title:') ?>

    <div class="form-group">
       <?= Html::submitButton('Edit', ['class' => 'btn btn-lg btn-primary col-lg-2']) ?>
    </div>
<?php ActiveForm::end() ?>