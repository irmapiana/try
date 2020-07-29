<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tfront */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tback-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'front_trxid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accountno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'itemid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tdate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'settlflag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rc')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
