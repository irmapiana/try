<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\Msalescommission */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msalescommission-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SCOMMISSIONID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'spriceid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'itemid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SCOMMISSION_0')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SCOMMISSION_1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SCOMMISSION_2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SCOMMISSION_VALIDFROM')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SCOMMISSION_VALIDUNTIL')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cdate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mdate')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
