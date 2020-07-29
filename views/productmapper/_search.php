<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\MproductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mproductmapper-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'productid1') ?>

    <?= $form->field($model, 'info') ?>

    <?= $form->field($model, 'item1') ?>

    <?= $form->field($model, 'switch') ?>

    <?php // echo $form->field($model, 'MDATE') ?>

    <?php // echo $form->field($model, 'product_name') ?>

    <?php // echo $form->field($model, 'ACTIVE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
