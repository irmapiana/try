<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\MregrpointSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mservice-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'service_name') ?>

    <?= $form->field($model, 'build_number') ?>

    <?= $form->field($model, 'url_mode') ?>

    <?= $form->field($model, 'active') ?>

    <?= $form->field($model, 'url') ?>

    <?php // echo $form->field($model, 'RRPOINT_VALIDFROM') ?>

    <?php // echo $form->field($model, 'RRPOINT_VALIDUNTIL') ?>

    <?php // echo $form->field($model, 'cby') ?>

    <?php // echo $form->field($model, 'cdate') ?>

    <?php // echo $form->field($model, 'mby') ?>

    <?php // echo $form->field($model, 'mdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
