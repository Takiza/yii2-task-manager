<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin() ?>
    <?= $form->field($post, 'type') ?>
    <?= $form->field($post, 'text') ?>
    <?= Html::submitButton('Send', ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end() ?>