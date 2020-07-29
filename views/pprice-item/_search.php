<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\models\Msellprice;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\Models\MspriceitemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mpurchasepriceitem-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php
        $dataPoduct=ArrayHelper::map(Msellprice::find()->all(), 'spriceid', 'SPRICE_NAME');
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
<!-- 
    <?= $form->field($model, 'PPITEM_VALIDFROM')->widget(DatePicker::classname(),[
              'options' => ['placeholder' => 'Pilih tanggal berlaku...'],
              'value' => 'yyyy-mm-dd',
              'type' => DatePicker::TYPE_COMPONENT_APPEND,
              
              'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => TRUE,
            ]
        ]);
    ?>
    <?= $form->field($model, 'SPIPEM_VALIDUNTIL')->widget(DatePicker::classname(),[
              'options' => ['placeholder' => 'Pilih tanggal berakhir...'],
              'value' => 'yyyy-mm-dd',
              'type' => DatePicker::TYPE_COMPONENT_APPEND,
              
              'pluginOptions' => [
                'autoclose'=>true,
                'format' => 'yyyy-mm-dd',
                'todayHighlight' => TRUE,
            ]
        ]);
    ?> -->

    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary', 'id' => 'btnSearch']) ?>
        <?= Html::resetButton('Ulangi', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>