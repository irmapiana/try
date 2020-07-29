<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Taccmutation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="taccmutation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'MUTATIONID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MTYPE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'AMOUNT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'noteS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BDATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cdate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mdate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SCHEMAID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sch_updatedD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ENDBALANCE')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
