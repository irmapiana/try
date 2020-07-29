<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InflokasiSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mlayout-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'layoutid') ?>

    <?= $form->field($model, 'width') ?>

    <?= $form->field($model, 'length') ?>

    <?= $form->field($model, 'cby') ?>

    <?= $form->field($model, 'cdate') ?>

    <?php // echo $form->field($model, 'LOKASI_KECAMATAN') ?>

    <?php // echo $form->field($model, 'LOKASI_KELURAHAN') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
