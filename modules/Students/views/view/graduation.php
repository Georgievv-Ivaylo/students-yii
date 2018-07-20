<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
// echo "<pre>";
// var_dump($students);
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
    </tr>
  </thead>
  <tbody>
		<?php foreach ($students as $student): ?>
    <tr>
      <td onclick="location.href='<?= Url::to([
      		'/students/view/graduation/', 'filter' => 'student_'. $student->name
      ]) ?>'" class="pointer"><?= $student->name ?></td>
      <td onclick="location.href='<?= Url::to([
      		'/students/view/graduation/', 'filter' => 'professor_'. $student->professorName
      ]) ?>'" class="pointer"><?= $student->professorName ?></td>
      <td onclick="location.href='<?= Url::to([
      		'/students/view/graduation/', 'filter' => 'exam_'. $student->examName
      ]) ?>'" class="pointer"><?= $student->examName ?></td>
      <td onclick="location.href='<?= Url::to([
      		'/students/view/graduation/', 'filter' => 'degree_'. $student->degreeName
      ]) ?>'" class="pointer"><?= $student->degreeName ?></td>
      <td onclick="location.href='<?= Url::to([
      		'/students/view/graduation/', 'filter' => 'work_title_'. $student->work_title
      ]) ?>'" class="pointer"><?= $student->work_title ?></td>
      <td onclick="location.href='<?= Url::to([
      		'/students/view/graduation-edit/', 'gid' => $student->id
      ]) ?>'" class="pointer"><?= $student->createdDate ?></td>
      <td onclick="location.href='<?= Url::to([
      		'/students/view/graduation-edit/', 'gid' => $student->id
      ]) ?>'" class="pointer"><?= $student->editedDate ?></td>
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
	<?= Html::a('Add Graduation', ['/students/view/graduation-add'], array('class' => 'btn-lg btn-info')); ?>
</div>
<?php
/**/?>