<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\MsalescommissionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msalescommission-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SCOMMISSIONID') ?>

    <?= $form->field($model, 'spriceid') ?>

    <?= $form->field($model, 'productid') ?>

    <?= $form->field($model, 'itemid') ?>

    <?= $form->field($model, 'SCOMMISSION_0') ?>

    <?php // echo $form->field($model, 'SCOMMISSION_1') ?>

    <?php // echo $form->field($model, 'SCOMMISSION_2') ?>

    <?php // echo $form->field($model, 'SCOMMISSION_VALIDFROM') ?>

    <?php // echo $form->field($model, 'SCOMMISSION_VALIDUNTIL') ?>

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
