<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BankSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'bank_code') ?>

    <?= $form->field($model, 'bank_name') ?>

    <?= $form->field($model, 'network') ?>

    <?php // echo $form->field($model, 'MBY') ?>

    <?php // echo $form->field($model, 'MDATE') ?>

    <?php // echo $form->field($model, 'ACTIVE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>