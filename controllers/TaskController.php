<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Task;


class TaskController extends Controller
{
	public function actionIndex()
	{
		$query = Task::find()->select('id, task')->orderBy('id ASC');
		$pages = new \yii\data\Pagination(['totalCount' => $query->count(), 'pageSize' => 2, 'pageSizeParam' => false, 'forcePageParam' => false]);
		$tasks = $query->offset($pages->offset)->limit($pages->limit)->all();
		return $this->render('index', compact('tasks', 'pages'));
	}

	public function actionView()
	{
		$id = \Yii::$app->request->get('id');
		$task = Task::findOne($id);
		if(empty($task)) throw new \yii\web\HttpException(404, 'Задание удалено, либо еще не создано...');
		return $this->render('view', compact('task'));
	}

	public function actionEdit()
	{
		$id = \Yii::$app->request->get('id');
		$task = Task::findOne($id);
		if(empty($task)) throw new \yii\web\HttpException(404, 'Задание удалено, либо еще не создано...');
		return $this->render('edit', compact('task'));
	}

	public function actionUpdate()
	{
		
	}
}
