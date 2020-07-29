<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\VrewmutationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vrewmutation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php $form->field($model, 'reward_mutationid') ?>

    <?php $form->field($model, 'userid') ?>

    <?php $form->field($model, 'mtype') ?>

    <?php $form->field($model, 'point') ?>

    <?php $form->field($model, 'end_balance') ?>

    <?php // echo $form->field($model, 'SOURCE_ACCOUNT') ?>

    <?php // echo $form->field($model, 'SOURCE_LEVEL') ?>

    <?php // echo $form->field($model, 'REMARK') ?>

    <?php // echo $form->field($model, 'cby') ?>

    <?php // echo $form->field($model, 'cdate') ?>

    <?php // echo $form->field($model, 'mby') ?>

    <?php // echo $form->field($model, 'mdate') ?>

    <?php
        echo '<label class="control-label">Tanggal transaksi:</label>';
    // echo '<div style="width:300px">';
    echo DatePicker::widget([
        'name' => 'from_date',
        'value' => (Yii::$app->request->get('from_date')) ?: date('d-M-Y'),
        'type' => DatePicker::TYPE_RANGE,
        'name2' => 'to_date',
        'value2' => (Yii::$app->request->get('to_date')) ?: date('d-M-Y'),
        'pluginOptions' => [
            'autoclose'=>true,
            //'format' => 'yyyy-mm-dd',
            'format' => 'dd-M-yyyy',
            'todayHighlight' => TRUE,
            'required' => true,
        ]
    ]);
    // echo '</div>';
    ?>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Ulangi', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
