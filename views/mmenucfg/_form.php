<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\switchinput\SwitchInput;

/* @var $this yii\web\View */
/* @var $model app\models\MMenucfg */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mmenucfg-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'menucode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menuname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menutitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menulink')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menuicon')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menuparent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'menuorder')->textInput(['maxlength' => true]) ?>

    <?=
    $form->field($model, 'status')->widget(SwitchInput::classname(), [
        'pluginOptions' => [
            'onText' => 'Aktif',
            'offText' => 'Tdk Aktif',
        ]
    ])
    ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Tambah' : 'Ubah', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a('Batal', ['index'], ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
