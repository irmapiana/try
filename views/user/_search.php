<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MuserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="muser-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'userid') ?>

    <?= $form->field($model, 'password') ?>

    <?= $form->field($model, 'groupid') ?>

    <?= $form->field($model, 'cby') ?>

    <?= $form->field($model, 'cdate') ?>

    <?php // echo $form->field($model, 'MBY') ?>

    <?php // echo $form->field($model, 'MDATE') ?>

    <?php // echo $form->field($model, 'NAME') ?>

    <?php // echo $form->field($model, 'ORGID') ?>

    <?php // echo $form->field($model, 'GROUP_USER') ?>

    <?php // echo $form->field($model, 'STATUS_USER') ?>

    <?php // echo $form->field($model, 'IDTYPE') ?>

    <?php // echo $form->field($model, 'IDNO') ?>

    <?php // echo $form->field($model, 'ADDRESS') ?>

    <?php // echo $form->field($model, 'RT') ?>

    <?php // echo $form->field($model, 'RW') ?>

    <?php // echo $form->field($model, 'KELURAHAN') ?>

    <?php // echo $form->field($model, 'KECAMATAN') ?>

    <?php // echo $form->field($model, 'CITY') ?>

    <?php // echo $form->field($model, 'PROVINCE') ?>

    <?php // echo $form->field($model, 'COUNTRY') ?>

    <?php // echo $form->field($model, 'POSTCODE') ?>

    <?php // echo $form->field($model, 'PHONENO') ?>

    <?php // echo $form->field($model, 'MOBILENO') ?>

    <?php // echo $form->field($model, 'CHANNEL') ?>

    <?php // echo $form->field($model, 'MOTHERNAME') ?>

    <?php // echo $form->field($model, 'EMAIL') ?>

    <?php // echo $form->field($model, 'BIRTHDATE') ?>

    <?php // echo $form->field($model, 'PROFILE_IMAGE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
