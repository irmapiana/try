<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DproductitemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dproductitem-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'productid') ?>

    <?= $form->field($model, 'itemid') ?>

    <?= $form->field($model, 'note') ?>

    <?= $form->field($model, 'transaction_type') ?>

    <?= $form->field($model, 'denom') ?>

    <?= $form->field($model, 'shortname') ?>

    <?= $form->field($model, 'header_receipt') ?>

    <?= $form->field($model, 'nominal_alias') ?>

    <?= $form->field($model, 'footer_receipt') ?>

    <?= $form->field($model, 'denom_notation') ?>

    <?= $form->field($model, 'logo') ?>

    <?= $form->field($model, 'cby') ?>

    <?= $form->field($model, 'cdate') ?>

    <?php // echo $form->field($model, 'MBY') ?>

    <?php // echo $form->field($model, 'MDATE') ?>

    <?php // echo $form->field($model, 'itemname') ?>

    <?php // echo $form->field($model, 'ACTIVE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
