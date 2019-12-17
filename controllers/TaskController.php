<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Task;
use app\models\Form;


class TaskController extends Controller
{
	public function actionIndex()
	{
		$query = Task::find()->select('id, task')->orderBy('id ASC');
		$pages = new \yii\data\Pagination(['totalCount' => $query->count(), 'pageSize' => 6, 'pageSizeParam' => false, 'forcePageParam' => false]);
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

	public function actionNew()
	{
		$post = new Form();
    	if($post->load(\Yii::$app->request->post())){
        	$data = new Task;
        	$data->task = $post->text;
        	$data->type = $post->type;
        	$data->save();
        	return $this->render('addConfirm');
    	}
    	return $this->render('new', compact('post'));
	}

	public function actionEdit()
	{
		$post = new Form();
    	if($post->load(\Yii::$app->request->post())){
    		$id = \Yii::$app->request->get('id');
			$data = Task::findOne($id);
        	$data->task = $post->text;
        	$data->type = $post->type;
        	$data->save();
        	return $this->render('editConfirm');
    	}
		return $this->render('edit', compact('post'));
	}

	public function actionDelete()
	{
		$id = \Yii::$app->request->get('id');
		$task = Task::findOne($id);
		$task->delete();
		return $this->render('deleteConfirm');
	}
}
