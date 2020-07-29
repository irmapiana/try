<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\TfrontSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tfront-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'BANKCODE') ?>

    <?= $form->field($model, 'MERCHANTID') ?>

    <?= $form->field($model, 'TERMINALID') ?>

    <?= $form->field($model, 'BATCHNUMBER') ?>

    <?= $form->field($model, 'SETTFLAG') ?>

    <?php // echo $form->field($model, 'SETTDATE') ?>

    <?php // echo $form->field($model, 'ISOMSG') ?>

    <?php // echo $form->field($model, 'RC') ?>

    <?php // echo $form->field($model, 'DATA1') ?>

    <?php // echo $form->field($model, 'DATA2') ?>

    <?php // echo $form->field($model, 'DATA3') ?>

    <?php // echo $form->field($model, 'DATA4') ?>

    <?php // echo $form->field($model, 'DATA5') ?>

    <?php // echo $form->field($model, 'DATA6') ?>

    <?php // echo $form->field($model, 'DATA7') ?>

    <?php // echo $form->field($model, 'DATA8') ?>

    <?php // echo $form->field($model, 'DATA9') ?>

    <?php // echo $form->field($model, 'DATA10') ?>

    <?php // echo $form->field($model, 'DATA11') ?>

    <?php // echo $form->field($model, 'DATA12') ?>

    <?php // echo $form->field($model, 'DATA13') ?>

    <?php // echo $form->field($model, 'DATA14') ?>

    <?php // echo $form->field($model, 'DATA15') ?>

    <?php // echo $form->field($model, 'DATA16') ?>

    <?php // echo $form->field($model, 'DATA17') ?>

    <?php // echo $form->field($model, 'DATA18') ?>

    <?php // echo $form->field($model, 'DATA19') ?>

    <?php // echo $form->field($model, 'DATA20') ?>

    <?php // echo $form->field($model, 'DATA21') ?>

    <?php // echo $form->field($model, 'DATA22') ?>

    <?php // echo $form->field($model, 'DATA23') ?>

    <?php // echo $form->field($model, 'DATA24') ?>

    <?php // echo $form->field($model, 'DATA25') ?>

    <?php // echo $form->field($model, 'DATA26') ?>

    <?php // echo $form->field($model, 'DATA27') ?>

    <?php // echo $form->field($model, 'DATA28') ?>

    <?php // echo $form->field($model, 'DATA29') ?>

    <?php // echo $form->field($model, 'DATA30') ?>

    <?php // echo $form->field($model, 'cby') ?>

    <?php // echo $form->field($model, 'cdate') ?>

    <?php // echo $form->field($model, 'mby') ?>

    <?php // echo $form->field($model, 'mdate') ?>

    <?php // echo $form->field($model, 'PID') ?>

    <?php // echo $form->field($model, 'ORGID') ?>

    <?php // echo $form->field($model, 'SCHEMAID') ?>

    <?php // echo $form->field($model, 'itemid') ?>

    <?php // echo $form->field($model, 'productid') ?>

    <?php // echo $form->field($model, 'FOOTPRINT') ?>

    <?php // echo $form->field($model, 'noteS') ?>

    <?php // echo $form->field($model, 'FRONT_TRXID') ?>

    <?php // echo $form->field($model, 'PRINT') ?>

    <?php // echo $form->field($model, 'TDATE') ?>

    <?php // echo $form->field($model, 'BACK_SCHEMAID') ?>

    <?php // echo $form->field($model, 'sch_updatedD') ?>

    <?php // echo $form->field($model, 'BACK_sch_updatedD') ?>

    <?php // echo $form->field($model, 'DATA31') ?>

    <?php // echo $form->field($model, 'COMMISSION') ?>

    <?php // echo $form->field($model, 'POINT') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
