<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\models\Msellprice;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\MsalesrewardSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="msalesreward-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php
        $dataPoduct=ArrayHelper::map(Msellprice::find()->all(), 'spriceid','ppitem_price');
        echo $form->field($model, 'spriceid')->widget(Select2::classname(), [
            'data' => $dataPoduct,
            'language' => 'id',
            'options' => [
                'placeholder' => 'Pilih Kode Harga...',
            ],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <!-- <?= $form->field($model, 'rewarditem_validfrom')->widget(DatePicker::classname(),[
              'options' => ['placeholder' => 'Pilih tanggal berlaku...'],
              'value' => 'yyyy-mm-dd',
              'type' => DatePicker::TYPE_COMPONENT_APPEND,
              
              'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'dd-mm-yyyy',
                'todayHighlight' => TRUE,
            ]
        ]);
    ?>
    <?= $form->field($model, 'rewarditem_validuntil')->widget(DatePicker::classname(),[
              'options' => ['placeholder' => 'Pilih tanggal berakhir...'],
              'value' => 'yyyy-mm-dd',
              'type' => DatePicker::TYPE_COMPONENT_APPEND,
              
              'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'dd-mm-yyyy',
                'todayHighlight' => TRUE,
            ]
        ]);
    ?> -->

    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Ulangi', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
