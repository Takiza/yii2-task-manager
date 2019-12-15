<?php print_r($task->task); ?>

<div>
	<a class="btn btn-default" href="<?= yii\helpers\Url::to(['task/edit', 'id' => $task->id]) ?>">Edit</a>
</div>