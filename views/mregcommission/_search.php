<?php

use yii\helpers\Html;
use yii\widgets\activeForm;

/* @var $this yii\web\View */
/* @var $model app\models\MregcommissionSearch */
/* @var $form yii\widgets\activeForm */
?>

<div class="mregcommission-search">

    <?php $form = activeForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'RCOMMISSIONID') ?>

    <?= $form->field($model, 'RCLEVEL_CODE') ?>

    <?= $form->field($model, 'REGCOST') ?>

    <?= $form->field($model, 'CASHBACK_0') ?>

    <?= $form->field($model, 'RCOMMISSION_1') ?>

    <?php // echo $form->field($model, 'RCOMMISSION_2') ?>

    <?php // echo $form->field($model, 'RCOMMISSION_VALIDFROM') ?>

    <?php // echo $form->field($model, 'RCOMMISSION_VALIDUNTIL') ?>

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
