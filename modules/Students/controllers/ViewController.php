<?php

namespace app\modules\Students\controllers;

use app\modules\Students\models\Student;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use yii\data\Sort;
use yii\web\Controller;
use app\modules\Students\models\GraduationAddForm;
use Yii;

class ViewController extends Controller
{
	private $filterAttributes = [
			'1' => [
					'asc' => ['students.name' => SORT_ASC],
					'desc' => ['students.name' => SORT_DESC],
					'default' => SORT_ASC,
					'label' => 'Name',
			],
			'2' => [
					'asc' => ['students.work_title' => SORT_ASC],
					'desc' => ['students.work_title' => SORT_DESC],
					'default' => SORT_ASC,
					'label' => 'WorkTitle',
			],
			'3' => [
					'asc' => ['students.created_on' => SORT_ASC],
					'desc' => ['students.created_on' => SORT_DESC],
					'default' => SORT_ASC,
					'label' => 'CreatedOn',
			],
			'4' => [
					'asc' => ['students.edited_on' => SORT_ASC],
					'desc' => ['students.edited_on' => SORT_DESC],
					'default' => SORT_ASC,
					'label' => 'EditedOn',
			],
			'5' => [
					'asc' => ['professors.name' => SORT_ASC],
					'desc' => ['professors.name' => SORT_DESC],
					'default' => SORT_ASC,
					'label' => 'ProfessorId',
			],
			'6' => [
					'asc' => ['degrees.name' => SORT_ASC],
					'desc' => ['degrees.name' => SORT_DESC],
					'default' => SORT_ASC,
					'label' => 'DegreeId',
			],
			'7' => [
					'asc' => ['exams.name' => SORT_ASC],
					'desc' => ['exams.name' => SORT_DESC],
					'default' => SORT_ASC,
					'label' => 'ExamId',
			],
	];

	public function actionGraduation($filter = '')
	{
// 		$query = Student::find()->select(['id', 'name', 'work_title', 'professor_id', 'degree_id', 'exam_id', 'created_on', 'edited_on']);
// 		$students = $query->all();
		$query = Student::find()
		->joinWith(['professor', 'degree', 'exam']);
		// get the total number of articles (but do not fetch the article data yet)
		$count = $query->count();

		$setFilter = ['students.deleted_on' => 1];
		if ($filter) {
			$filterTokens = explode('_', $filter);
			if ($filterTokens[0] != 'work') {
				$setFilter[array_shift($filterTokens) .'s.name'] = implode('_', $filterTokens);
			} else {
				array_shift($filterTokens);
				array_shift($filterTokens);
				$setFilter['students.work_title'] = implode('_', $filterTokens);
			}
		}

		$sort = new Sort([
				'attributes' => [
						'1' => [
								'asc' => ['students.name' => SORT_ASC],
								'desc' => ['students.name' => SORT_DESC],
								'default' => SORT_ASC,
								'label' => 'Name',
						],
						'2' => [
								'asc' => ['students.work_title' => SORT_ASC],
								'desc' => ['students.work_title' => SORT_DESC],
								'default' => SORT_ASC,
								'label' => 'WorkTitle',
						],
						'3' => [
								'asc' => ['students.created_on' => SORT_ASC],
								'desc' => ['students.created_on' => SORT_DESC],
								'default' => SORT_ASC,
								'label' => 'CreatedOn',
						],
						'4' => [
								'asc' => ['students.edited_on' => SORT_ASC],
								'desc' => ['students.edited_on' => SORT_DESC],
								'default' => SORT_ASC,
								'label' => 'EditedOn',
						],
						'5' => [
								'asc' => ['professors.name' => SORT_ASC],
								'desc' => ['professors.name' => SORT_DESC],
								'default' => SORT_ASC,
								'label' => 'ProfessorId',
						],
						'6' => [
								'asc' => ['degrees.name' => SORT_ASC],
								'desc' => ['degrees.name' => SORT_DESC],
								'default' => SORT_ASC,
								'label' => 'DegreeId',
						],
						'7' => [
								'asc' => ['exams.name' => SORT_ASC],
								'desc' => ['exams.name' => SORT_DESC],
								'default' => SORT_ASC,
								'label' => 'ExamId',
						],
				],
		]);

		$pages = new Pagination(['totalCount' => $count]);
		$pages->setPageSize(5);

		$DataProvider = new ActiveDataProvider([
				'query' => $query->select([
						'students.id',
						'students.name', 'students.work_title',
						'students.professor_id', 'students.degree_id',
						'students.exam_id', 'students.created_on', 'students.edited_on'
				])
				->where( $setFilter ),
				'pagination' => $pages,
				'sort' => $sort,
		]);



		// create a pagination object with the total count
		$students = $DataProvider->getModels();

// 		$students = $query->select([
// 				'students.id',
// 				'students.name', 'students.work_title',
// 				'students.professor_id', 'students.degree_id',
// 				'students.exam_id', 'students.created_on', 'students.edited_on'
// 		])
// 		->where( $setFilter )
// 		->orderBy($sort->orders)
// 		->offset($pages->offset)
// 		->limit($pages->limit)
// 		->all();

		return $this->render('graduation', [
				'pageTitle' => 'Students examination for graduation:',
				'students' => $students,
				'sort' => $sort,
				'pages' => $pages,
		]);
	}

	public function actionGraduationAdd()
	{

		$model = new GraduationAddForm();

		if ($model->load(Yii::$app->request->post()) && $model->validate()) {

			$student = new Student();
			$student->setAttributes(Yii::$app->request->post()['GraduationAddForm'], false);
			$student->save();

			return $this->redirect(['/students/view/graduation']);
		} else {
			// either the page is initially displayed or there is some validation error
			return $this->render('graduation_add', [
					'pageTitle' => 'New graduation:',
					'model' => $model
			]);
		}
	}

	public function actionGraduationEdit($gid)
	{

		$model = new GraduationAddForm();
		$query = Student::find()->select(['id', 'name', 'work_title', 'professor_id', 'degree_id', 'exam_id', 'created_on', 'edited_on']);
		$student = $query->where(['id' => $gid])->one();
// 		var_dump($student->attributes);exit;

		if ($model->load(Yii::$app->request->post()) && $model->validate()) {

			$student->setAttributes(Yii::$app->request->post()['GraduationAddForm'], false);
			$student->save();

			return $this->redirect(['/students/view/graduation']);
		} else {
			$model->setAttributes($student->attributes, false);
			return $this->render('graduation_edit', [
					'pageTitle' => 'Edit graduation information:',
					'student' => $student,
					'model' => $model
			]);
		}
	}
}

