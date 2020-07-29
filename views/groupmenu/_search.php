<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BankSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="groupmenu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'group_menuid') ?>

    <?= $form->field($model, 'label') ?>

    <?= $form->field($model, 'resourceid') ?>

    <?= $form->field($model, 'parent') ?>

    <?= $form->field($model, 'group_menu_seq') ?>

    <?= $form->field($model, 'cby') ?>

    <?= $form->field($model, 'cdate') ?>

    <?= $form->field($model, 'level') ?>

    <?= $form->field($model, 'bar_type') ?>

    <?= $form->field($model, 'has_group_child') ?>

    <?= $form->field($model, 'category') ?>

    <?= $form->field($model, 'next_class') ?>

    <?php // echo $form->field($model, 'mby') ?>

    <?php // echo $form->field($model, 'mdate') ?>

    <?php // echo $form->field($model, 'active') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
