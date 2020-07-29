<?php

use yii\helpers\Html;
use yii\widgets\activeForm;

/* @var $this yii\web\View */
/* @var $model app\Models\Inflokasi */
/* @var $form yii\widgets\activeForm */
?>

<div class="inflokasi-form">

    <?php $form = activeForm::begin(); ?>

    <?= $form->field($model, 'LOKASI_ID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LOKASI_KODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LOKASI_NAMA')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php activeForm::end(); ?>

</div>
