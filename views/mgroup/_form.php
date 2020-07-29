<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MGroup */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mgroup-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'GROUPID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'note')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cdate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mdate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'GROUPNAME')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
