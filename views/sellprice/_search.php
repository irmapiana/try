<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MsellpriceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msellprice-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?=// $form->field($model, 'spriceid') ?>

    <?= //$form->field($model, 'ppitemid') ?>

    <?= //$form->field($model, 'ppitem_validfrom') ?>

    <?= //$form->field($model, 'ppitem_validuntil') ?>

    <?= //$form->field($model, 'cby') ?>

    <?php // echo $form->field($model, 'CDATE') ?>

    <?php // echo $form->field($model, 'MBY') ?>

    <?php // echo $form->field($model, 'MDATE') ?>

    <?php // echo $form->field($model, 'NOTE') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary','id'=> 'btnsearch']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
