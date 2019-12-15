
<div class="body-content">

        <div class="row">
        	<?php foreach ($tasks as $task): ?>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p><?= mb_strimwidth($task->task, 0, 90, "...") ?></p>

                <p><a class="btn btn-default" href="<?= yii\helpers\Url::to(['task/view', 'id' => $task->id]) ?>">Read more &raquo;</a></p>
            </div>
        	<?php endforeach;?>
        </div>

    </div>
    <?= \yii\widgets\LinkPager::widget(['pagination' => $pages]) ?>