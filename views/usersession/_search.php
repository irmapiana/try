<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsersessionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usersession-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'SSID') ?>

    <?= $form->field($model, 'SECRETKEY') ?>

    <?= $form->field($model, 'IMEIID') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'NAME') ?>

    <?= $form->field($model, 'MOBILENO') ?>

    <?= $form->field($model, 'BIRTHDATE') ?>
    
    <?= $form->field($model, 'MOTHERNAME') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
