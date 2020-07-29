<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tfront-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'front_trxid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enc_subscriber_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subscriber_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'accountno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'productid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'itemid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'admin_fee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'purchase_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'selling_fee')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sell_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'settlflag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tdate')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
