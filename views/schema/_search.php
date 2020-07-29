<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MschemaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mschema-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'productid') ?>

    <?= $form->field($model, 'itemid') ?>

    <?= $form->field($model, 'schemaid') ?>

    <?= $form->field($model, 'cby') ?>

    <?= $form->field($model, 'cdate') ?>

    <?php // echo $form->field($model, 'mby') ?>

    <?php // echo $form->field($model, 'mdate') ?>

    <?php // echo $form->field($model, 'CLASSNAME') ?>

    <?php // echo $form->field($model, 'ITYPE') ?>

    <?php // echo $form->field($model, 'CA_ADMINFEE') ?>

    <?php // echo $form->field($model, 'FIX_CA_ADMINFEE') ?>

    <?php // echo $form->field($model, 'CASHBACKID') ?>

    <?php // echo $form->field($model, 'MINUS_FACTOR') ?>

    <?php // echo $form->field($model, 'PLUS_FACTOR') ?>

    <?php // echo $form->field($model, 'INVOICE_METHOD') ?>

    <?php // echo $form->field($model, 'PPN') ?>

    <?php // echo $form->field($model, 'BANKCODE') ?>

    <?php // echo $form->field($model, 'ORGID') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'CONVERTER') ?>

    <?php // echo $form->field($model, 'DESTINATIONID') ?>

    <?php // echo $form->field($model, 'RECON_CODE') ?>

    <?php // echo $form->field($model, 'PID') ?>

    <?php // echo $form->field($model, 'userid') ?>

    <?php // echo $form->field($model, 'CID') ?>

    <?php // echo $form->field($model, 'MULTIPLY_FACTOR') ?>

    <?php // echo $form->field($model, 'FEEBASE') ?>

    <?php // echo $form->field($model, 'UPDATED') ?>

    <?php // echo $form->field($model, 'sch_updatedD') ?>

    <?php // echo $form->field($model, 'CALENDARID') ?>

    <?php // echo $form->field($model, 'ADMININCLUDE') ?>

    <?php // echo $form->field($model, 'INPUT1') ?>

    <?php // echo $form->field($model, 'INPUT2') ?>

    <?php // echo $form->field($model, 'INPUT3') ?>

    <?php // echo $form->field($model, 'INPUT4') ?>

    <?php // echo $form->field($model, 'spriceid') ?>

    <?php // echo $form->field($model, 'PPRICEID') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
