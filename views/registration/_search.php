<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\MproductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mregistration-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'account_name') ?>

    <?= $form->field($model, 'enc_card_number') ?>

    <?= $form->field($model, 'cby') ?>

    <?= $form->field($model, 'cdate') ?>

    <?= $form->field($model, 'mby') ?>

    <?= $form->field($model, 'flag') ?>

    <?= $form->field($model, 'alamat')?>

    <?= $form->field($model, 'propinsi') ?>

    <?= $form->field($model, 'kota') ?>

    <?= $form->field($model, 'terminal_id') ?>

    <?php // echo $form->field($model, 'product_name') ?>

    <?php // echo $form->field($model, 'ACTIVE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
