<?php

use yii\helpers\Html;
use yii\widgets\activeForm;

/* @var $this yii\web\View */
/* @var $model app\models\broadcastSearch */
/* @var $form yii\widgets\activeForm */
?>

<div class="broadcast-search">

    <?php $form = activeForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'TOPICID') ?>

    <?= $form->field($model, 'TITLE') ?>

    <?= $form->field($model, 'POSTDATE') ?>

    <?= $form->field($model, 'POSTBY') ?>

    <?= $form->field($model, 'MESSAGE') ?>

    <?= $form->field($model, 'MESSAGEID') ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php activeForm::end(); ?>

</div>
