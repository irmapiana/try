<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use app\models\Dproductitem;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $model app\models\Bank */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productmenu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'group_menuid')->textInput(['maxlength' => true]) ?>

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

    <?= $form->field($model, 'item_seq')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'next_class')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropdownList([
        'Y' => 'Ya',
        'N' => 'Tidak'
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
