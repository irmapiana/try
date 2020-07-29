<?php

use yii\helpers\Html;
use yii\widgets\activeForm;

/* @var $this yii\web\View */
/* @var $model app\models\MorgSearch */
/* @var $form yii\widgets\activeForm */
?>

<div class="morg-search">

    <?php $form = activeForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ISOBIT') ?>

    <?= $form->field($model, 'ISOVALUE') ?>

    <?= $form->field($model, 'ADDRESS') ?>

    <?= $form->field($model, 'PIC') ?>

    <?= $form->field($model, 'EMAIL') ?>

    <?php // echo $form->field($model, 'TLP') ?>

    <?php // echo $form->field($model, 'BALANCE') ?>

    <?php // echo $form->field($model, 'CHECKLIMIT') ?>

    <?php // echo $form->field($model, 'cby') ?>

    <?php // echo $form->field($model, 'cdate') ?>

    <?php // echo $form->field($model, 'mby') ?>

    <?php // echo $form->field($model, 'mdate') ?>

    <?php // echo $form->field($model, 'ORGNAME') ?>

    <?php // echo $form->field($model, 'ORGID') ?>

    <?php // echo $form->field($model, 'ITEXT') ?>

    <?php // echo $form->field($model, 'PRINT') ?>

    <?php // echo $form->field($model, 'PARENT_ORGID') ?>

    <?php // echo $form->field($model, 'ISDEALER') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php activeForm::end(); ?>

</div>
