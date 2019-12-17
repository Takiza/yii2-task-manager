<div>
	<h3><?= $task->type ?></h3>
	<p><?= $task->task ?></p>
</div>
<div>
	<a class="btn btn-default" href="<?= yii\helpers\Url::to(['task/edit', 'id' => $task->id]) ?>">Edit</a>
	<a class="btn btn-default" href="<?= yii\helpers\Url::to(['task/delete', 'id' => $task->id]) ?>">Delete</a>
</div>