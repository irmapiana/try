<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="promo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'promo_seq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url_content')->textInput(['maxlength' => true]) ?>

     <?= $form->field($model, 'active')->dropdownList([
        1 => 'Ya',
        0 => 'Tidak'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
