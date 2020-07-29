<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MMenucfgSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mmenucfg-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'menucode') ?>

    <?= $form->field($model, 'menuname') ?>

    <?= $form->field($model, 'menutitle') ?>

    <?= $form->field($model, 'menulink') ?>

    <?= $form->field($model, 'menuicon') ?>

    <?php // echo $form->field($model, 'MENUPARENT') ?>

    <?php // echo $form->field($model, 'MENUORDER') ?>

    <?php // echo $form->field($model, 'STATUS') ?>

    <?php // echo $form->field($model, 'cdate') ?>

    <?php // echo $form->field($model, 'cby') ?>

    <?php // echo $form->field($model, 'mdate') ?>

    <?php // echo $form->field($model, 'mby') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
