<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BankSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tfront-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'front_trxid') ?>

    <?= $form->field($model, 'enc_subscriber_id') ?>

    <?= $form->field($model, 'subscriber_name') ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'accountno') ?>

    <?= $form->field($model, 'productid') ?>

    <?= $form->field($model, 'itemid') ?>

    <?= $form->field($model, 'tdate') ?>

    <?= $form->field($model, 'amount') ?>

    <?= $form->field($model, 'admin_fee') ?>

    <?= $form->field($model, 'purchase_price') ?>

    <?= $form->field($model, 'selling_fee') ?>

    <?= $form->field($model, 'sell_price') ?>

    <?= $form->field($model, 'rc') ?>

    <?= $form->field($model, 'settlflag') ?>

    <?php // echo $form->field($model, 'MBY') ?>

    <?php // echo $form->field($model, 'MDATE') ?>

    <?php // echo $form->field($model, 'ACTIVE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
