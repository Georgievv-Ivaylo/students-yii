<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
$thisController = '/students/view/graduation/';
?>

<h1 class="text-center"><?= Html::encode($pageTitle) ?></h1>
<table class="table table-hover">
  <thead>
    <tr>
      <th onclick="location.href='<?= $sort->createUrl('1') ?>'" class="pointer">Student</th>
      <th onclick="location.href='<?= $sort->createUrl('5') ?>'" class="pointer">Professor</th>
      <th onclick="location.href='<?= $sort->createUrl('7') ?>'" class="pointer">Exam</th>
      <th onclick="location.href='<?= $sort->createUrl('6') ?>'" class="pointer">Degree</th>
      <th onclick="location.href='<?= $sort->createUrl('2') ?>'" class="pointer">Title of work</th>
      <th onclick="location.href='<?= $sort->createUrl('3') ?>'" class="pointer">Created</th>
      <th onclick="location.href='<?= $sort->createUrl('4') ?>'" class="pointer">Edited</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
		<?php foreach ($students as $student): ?>
    <tr>
      <td onclick="location.href='<?= Url::to([
      		$thisController, 'filter' => 'student_'. $student->name
      ]) ?>'" class="pointer vertical-middle"><?= $student->name ?></td>
      <td onclick="location.href='<?= Url::to([
      		$thisController, 'filter' => 'professor_'. $student->professorName
      ]) ?>'" class="pointer vertical-middle"><?= $student->professorName ?></td>
      <td onclick="location.href='<?= Url::to([
      		$thisController, 'filter' => 'exam_'. $student->examName
      ]) ?>'" class="pointer vertical-middle"><?= $student->examName ?></td>
      <td onclick="location.href='<?= Url::to([
      		$thisController, 'filter' => 'degree_'. $student->degreeName
      ]) ?>'" class="pointer vertical-middle"><?= $student->degreeName ?></td>
      <td onclick="location.href='<?= Url::to([
      		$thisController, 'filter' => 'work_title_'. $student->work_title
      ]) ?>'" class="pointer vertical-middle"><?= $student->work_title ?></td>
      <td onclick="location.href='<?= Url::to([
      		'/students/view/graduation-edit/', 'gid' => $student->id
      ]) ?>'" class="pointer vertical-middle"><?= $student->createdDate ?></td>
      <td onclick="location.href='<?= Url::to([
      		'/students/view/graduation-edit/', 'gid' => $student->id
      ]) ?>'" class="pointer vertical-middle"><?= $student->editedDate ?></td>
      <td class="vertical-middle">
      	<div class="text-center">
					<?= Html::a('Edit', [
								'/students/view/graduation-edit/', 'gid' => $student->id
	      			], ['class' => 'btn btn-info m_5']) ?>
	      	<form id="delete_record_<?= $student->id ?>" method="post" action="<?= Url::to([ '/students/view/remove' ]) ?>">
	      		<input type="hidden" name="id" value="<?= $student->id ?>" />

	    			<input id="form-token" type="hidden" name="<?=Yii::$app->request->csrfParam?>" value="<?=Yii::$app->request->csrfToken?>"/>
				   	 <?= Html::submitButton('Delete', ['class' => 'btn btn-warning m_5']) ?>
	      	</form>
      	</div>
      </td>
    </tr>
		<?php endforeach; ?>
  </tbody>
</table>
<div class="text-center">
	<?php
	// display pagination
	echo LinkPager::widget([
	'pagination' => $pages,
	]);?>
</div>
<div class="text-center">
	<?= Html::a('Add Graduation', ['/students/view/graduation-add'], array('class' => 'btn btn-lg btn-info')); ?>
</div>
<?php
/**/?>