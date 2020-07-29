<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\Models\Tfront */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tfront-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'BANKCODE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MERCHANTID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TERMINALID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BATCHNUMBER')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SETTFLAG')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SETTDATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ISOMSG')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA4')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA5')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA6')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA7')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA8')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA9')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA10')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA11')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA12')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA13')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA14')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA15')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA16')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA17')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA18')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA19')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA20')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA21')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA22')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA23')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA24')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA25')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA26')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA27')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA28')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA29')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA30')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cdate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mby')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mdate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ORGID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SCHEMAID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'itemid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FOOTPRINT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'noteS')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FRONT_TRXID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PRINT')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TDATE')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BACK_SCHEMAID')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sch_updatedD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BACK_sch_updatedD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DATA31')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'COMMISSION')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'POINT')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
