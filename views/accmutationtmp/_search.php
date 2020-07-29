<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TaccmutationtmpSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="taccmutationtmp-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'MUTATIONID') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'MTYPE') ?>

    <?= $form->field($model, 'AMOUNT') ?>

    <?= $form->field($model, 'noteS') ?>

    <?php // echo $form->field($model, 'BDATE') ?>

    <?php // echo $form->field($model, 'cby') ?>

    <?php // echo $form->field($model, 'cdate') ?>

    <?php // echo $form->field($model, 'mby') ?>

    <?php // echo $form->field($model, 'mdate') ?>

    <?php // echo $form->field($model, 'SCHEMAID') ?>

    <?php // echo $form->field($model, 'sch_updatedD') ?>

    <?php // echo $form->field($model, 'ENDBALANCE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
