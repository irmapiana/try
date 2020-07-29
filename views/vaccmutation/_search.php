<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\DatePicker;
use app\models\Vaccmutation;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;


/* @var $this yii\web\View */
/* @var $model app\Models\MspriceitemSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vaccmutation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php
    echo '<label class="control-label">Tanggal transaksi:</label>';
    echo '<div style="width:300px">';
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
    echo '</div>';
    ?>
    <br>
    <div class="form-group">
        <?= Html::submitButton('Cari', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Ulangi', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
