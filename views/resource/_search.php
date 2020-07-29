<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\broadcastSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mresource-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'resourceid') ?>

    <?= $form->field($model, 'resource_type') ?>

    <?= $form->field($model, 'resource_url') ?>

    <?= $form->field($model, 'layout_id') ?>

    <?= $form->field($model, 'cby') ?>

    <?= $form->field($model, 'cdate') ?>

    <?= $form->field($model, 'mby') ?>

    <?= $form->field($model, 'mdate') ?>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
