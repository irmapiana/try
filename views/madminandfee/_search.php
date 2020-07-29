<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\models\Madminandfee;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\MspriceadminSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="madminandfee-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php
        $dataPoduct=ArrayHelper::map(Madminandfee::find()->all(), 'productid', 'productid');
        echo $form->field($model, 'productid')->widget(Select2::classname(), [
            'data' => $dataPoduct,
            'language' => 'id',
            'options' => [
                'placeholder' => 'Pilih Produk...',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?php // $form->field($model, 'SPADMINID') ?>

    <?php // $form->field($model, 'spriceid') ?>

    <?php // $form->field($model, 'productid') ?>

    <?php // $form->field($model, 'itemid') ?>

    <?php // $form->field($model, 'SPADMIN_PRICE') ?>

    <?php // echo $form->field($model, 'SPADMIN_VALIDFROM') ?>

    <?php // echo $form->field($model, 'SPADMIN_VALIDUNTIL') ?>

    <?php // echo $form->field($model, 'cby') ?>

    <?php // echo $form->field($model, 'cdate') ?>

    <?php // echo $form->field($model, 'mby') ?>

    <?php // echo $form->field($model, 'mdate') ?>

    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary', 'id' => 'btnSearch']) ?>
        <?= Html::resetButton('Ulangi', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
