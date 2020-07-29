<?php

use yii\helpers\Html;
use yii\widgets\activeForm;

/* @var $this yii\web\View */
/* @var $model app\Models\MregrpointSearch */
/* @var $form yii\widgets\activeForm */
?>

<div class="mregrpoint-search">

    <?php $form = activeForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'RRPOINTID') ?>

    <?= $form->field($model, 'RRPLEVEL_CODE') ?>

    <?= $form->field($model, 'RRPOINT_0') ?>

    <?= $form->field($model, 'RRPOINT_1') ?>

    <?= $form->field($model, 'RRPOINT_2') ?>

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

    <?php activeForm::end(); ?>

</div>
