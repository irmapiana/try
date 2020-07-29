<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Mproduct;
use app\models\Dproductitem;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Bank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productmessage-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=
    $form->field($model, 'productid')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Mproduct::find()->where(['active'=>'Y'])->orderBy(['product_name' => SORT_ASC])->all(), 'productid', 'productid'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Produk..'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        'disabled' => isset($used) ? $used : false,
    ]);
    ?>

    <?=
    $form->field($model, 'itemid')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Dproductitem::find()->where(['active'=>'Y'])->orderBy(['itemname' => SORT_ASC])->all(), 'itemid', 'itemid'),
        'language' => 'id',
        'options' => ['placeholder' => 'Pilih Produk item..'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        'disabled' => isset($used) ? $used : false,
    ]);
    ?>
    <?= $form->field($model, 'message_prefix')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
