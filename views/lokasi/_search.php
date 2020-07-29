<?php

use yii\helpers\Html;
use yii\widgets\activeForm;

/* @var $this yii\web\View */
/* @var $model app\models\InflokasiSearch */
/* @var $form yii\widgets\activeForm */
?>

<div class="inflokasi-search">

    <?php $form = activeForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'LOKASI_ID') ?>

    <?= $form->field($model, 'LOKASI_KODE') ?>

    <?= $form->field($model, 'LOKASI_NAMA') ?>

    <?= $form->field($model, 'LOKASI_PROPINSI') ?>

    <?= $form->field($model, 'LOKASI_KABUPATENKOTA') ?>

    <?php // echo $form->field($model, 'LOKASI_KECAMATAN') ?>

    <?php // echo $form->field($model, 'LOKASI_KELURAHAN') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php activeForm::end(); ?>

</div>
