<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MMenugroupSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mmenugroup-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'menucode') ?>

    <?= $form->field($model, 'group_user') ?>

    <?= $form->field($model, 'cdate') ?>

    <?= $form->field($model, 'cby') ?>

    <?= $form->field($model, 'mdate') ?>

    <?php // echo $form->field($model, 'mby') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
