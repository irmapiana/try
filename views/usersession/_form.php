<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usersession */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usersession-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'SSID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SECRETKEY')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IMEIID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userid')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
